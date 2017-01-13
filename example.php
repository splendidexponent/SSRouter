<?php

require __DIR__ . '/SSRouter.php';

$router = new SSRouter;
$router->get('/^$/', 'the_home');
$router->get('/id=\d+/', 'the_post');
$router->post('/name=.+/', 'say_hello');
$router->run();

function the_home(){
	$f = "<form method='post'>Your name: <input type='text' name='name' /></form>";

	return sprintf("This is my homepage %s", $f);
}

function say_hello(){
	return sprintf("Hello %s", $_REQUEST['name']);
}

function the_post(){
	return sprintf("Hello, my id is #%s", $_REQUEST['id']);
}
