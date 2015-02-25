<?php

	/*
	 * Simple Routing Framework
	 * https://github.com/BenPoulson/SimpleRoutingFramework
	 * Copyright (C) 2015 Ben Poulson <ben@terravita.co.uk>
	 * Licensed under the GNU General Public License.
	 */

	/* Autoload in the classes required as and when we call them */
	/* For example when we call Router, it will autoload in /app/Router.php */
	function __autoload($class) {
		require_once __DIR__ . '/../app/' . $class . '.php';
	}

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

?>