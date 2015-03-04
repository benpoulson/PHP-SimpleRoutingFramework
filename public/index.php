<?php

	/*
	 * Simple Routing Framework
	 * https://github.com/BenPoulson/SimpleRoutingFramework
	 * Copyright (C) 2015 Ben Poulson <ben@terravita.co.uk>
	 * Licensed under the GNU General Public License.
	 */

	/* 
	 * Autoload in the classes required as and when we call them
	 * For example when we call Router, it will autoload in /app/Router.php
	 */
	function __autoload($class) {

		/* Only load the class if the name contains accepted characters */
		if(preg_match('/[a-z]/i', $class)) {
			require_once __DIR__ . '/../app/' . $class . '.php';
		}
	}

	/* Initialise the routing engine */
	Router::initialise();

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

?>