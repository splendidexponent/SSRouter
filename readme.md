# SSRouter (Super Simple Router) for PHP

SSRouter is a very simple, efficient enough and super light weight (~50 LOC) router for PHP, based on alphabetized query string. It maps regular expression routes based on query strings to PHP functions.

The callback function can be of any PHP [callable type](http://php.net/manual/en/language.types.callable.php).

## Usage
```php
$router = new SSRouter;
$router->get('/id=\d+/', 'the_post');
$router->post('/name=.+/', 'say_hello');
$router->run();

function say_hello(){
	return sprintf("Hello %s", $_REQUEST['name']);
}

function the_post(){
	return sprintf("Hello, my id is #%s", $_REQUEST['id']);
}

```

## Todo
* Composer integration