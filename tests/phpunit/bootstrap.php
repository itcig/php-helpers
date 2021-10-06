<?php

const PHP_HELPERS_PATH = __DIR__ . '/../../';
const TESTS_PATH = __DIR__ . '/';

// Set a flag so that certain functions know we're running tests
const RUNNING_TESTS = true;

// Test Autoloader (includes root autoload.php)
require_once(TESTS_PATH . 'autoload.php');
