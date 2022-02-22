<?php
/**
 * Bootstrap PHP tests
 *
 * @package itcig/php-helpers
 */

define("PHP_HELPERS_PATH", dirname(__DIR__, 2));
define("TESTS_PATH", __DIR__);

// Test Autoloader (includes root autoload.php)
require_once(TESTS_PATH . '/autoload.php');
