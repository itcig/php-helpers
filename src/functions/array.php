<?php

namespace Cig;

/**
 * Recursively filter an array
 *
 * @param array $array
 * @param callable $callback
 *
 * @return array
 */
function array_filter_recursive(array $array, callable $callback = null): array {
	$array = is_callable($callback) ? array_filter($array, $callback) : array_filter($array);
	foreach ($array as &$value) {
		if (is_array($value)) {
			$value = call_user_func(__FUNCTION__, $value, $callback);
		}
	}

	return $array;
}

/**
 * Test if an array is associative
 *
 * @param array $arr
 *
 * @return bool True if associative array
 */
function is_assoc(array $arr) {
	if (array() === $arr) return false;
	return array_keys($arr) !== range(0, count($arr) - 1);
}

/**
 * Convert PHP array into Javascript object, checking for child arrays and proper variable types
 *
 * @param array $arr
 * @param bool $sequential_keys
 * @param bool $quote_keys
 *
 * @return string
 */
function to_javascript_object(array $arr, $sequential_keys = false, $quote_keys = false) {

	$output = is_assoc($arr) ? "{" : "[";
	$count = 0;
	foreach ($arr as $key => $value) {

		if (is_assoc($arr) || (!is_assoc($arr) && $sequential_keys == true )) {
			$output .= ($quote_keys ? '"' : '') . $key . ($quote_keys ? '"' : '') . ': ';
		}

		if (is_array($value)) {
			$output .= to_javascript_object($value, $sequential_keys, $quote_keys);
		}
		// Convert boolean to JS keyword `true|false`
		else if (is_bool($value)) {
			$output .= ($value ? 'true' : 'false');
		}
		// Check for octal notation beginning with 0 in addition to is_numeric()
		// Also account for values that are literally 0 and keep these numeric
		else if (is_numeric($value) && (strpos($value, "0") !== 0 || empty($value))) {
			$output .= $value;
		}
		else {
			$output .= '"' . $value . '"';
		}

		if (++$count < count($arr)) {
			$output .= ', ';
		}
	}

	$output .= is_assoc($arr) ? "}" : "]";

	return $output;
}
