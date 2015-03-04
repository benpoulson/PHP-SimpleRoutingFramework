<?php

	/*
	 * Simple Routing Framework
	 * https://github.com/BenPoulson/SimpleRoutingFramework
	 * Copyright (C) 2015 Ben Poulson <ben@terravita.co.uk>
	 * Licensed under the GNU General Public License.
	 */

	class Router {

		private static $routes = [];

		public static function initialise() {
			register_shutdown_function(function() {
				self::executeRoute($_SERVER['REQUEST_URI']);
			});
		}
		
		public static function addRoute($request_type, $pattern, $callback) {
			$pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
			self::$routes[$request_type][$pattern] = $callback;
		}

		public static function executeRoute($url) {
			$request_type = $_SERVER['REQUEST_METHOD'];
			foreach (self::$routes[$request_type] as $regex => $function) {
				if (preg_match($regex, $url, $params)) {
					array_shift($params);
					ksort($params, SORT_NATURAL);
					return call_user_func_array($function, [$params]);
				}
			}
		}

	}

?>