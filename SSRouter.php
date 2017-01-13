<?php

/**
* Super Simple Router, based on alphabetized query string and regular expressions
*/
class SSRouter
{ 
  function __construct()
  {
    $this->get_routes = array();
    $this->post_routes = array();
  }

  function get($pattern, $callback){
    $this->get_routes[$pattern] = $callback;
  }

  function post($pattern, $callback){
    $this->post_routes[$pattern] = $callback;
  }

  function run(){
    $match = '/';

    switch($_SERVER['REQUEST_METHOD']){
      case 'GET': 
        $this->do_request($_GET, $this->get_routes);
        break;

      case 'POST': 
        $this->do_request($_POST, $this->post_routes);
        break;
    }
  }

  private function do_request($request, $routes){
    $callback = $this->find_match($request, $routes);
    if($callback){
      echo call_user_func($callback);
    } else {
      header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
      echo "404 error! Page not found.";
    }
  }

  private function find_match($request, $available_routes){
    ksort($request);
    $alphabetized_request_url = http_build_query($request);

    foreach ($available_routes as $route => $callback) {
      if(preg_match($route, $alphabetized_request_url) === 1){
        return $callback;
      }
    }

    return false;
  }
}
