# SimpleRoutingFramework
A simple PHP routing framework for rapid application development

## Example usage

```php
/* Initialise the routing engine */
Router::initialise();

/* GET /example/123/ */
Router::addRoute('GET', '/example/(\d+)/?', function($arg1) {
	echo 'Example #' . $arg1;
});

/* GET /example/ */
Router::addRoute('GET', '/example/?', function() {
	echo 'Example Listing';
});

/* GET / */
Router::addRoute('GET', '/?', function() {
	echo 'Home';
});
```
