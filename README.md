# SimpleRoutingFramework
A simple PHP routing framework for rapid application development

## Example usage

```php
/* GET /user/13214/edit/ */
Router::addRoute('GET', '/user/(?<user_id>[0-9]+)/(?<action>[a-z]+)/?', function($args) {
	print_r($args);
	/*
		Array
		(
		    [0] => 13214
		    [1] => edit
		    [action] => edit
		    [user_id] => 13214
		)
	*/
});

/* GET /user/ */
Router::addRoute('GET', '/user/?', function() {
	echo 'List all users';
});

/* GET / */
Router::addRoute('GET', '/?', function() {
	echo 'Home';
});
```
