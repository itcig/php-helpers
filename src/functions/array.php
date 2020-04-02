<?php

namespace Cig;

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
		else if (is_bool($value)) {
			$output .= ($value ? 'true' : 'false');
		}
		// Check for octal notation beginning with 0 in addition to is_numeric()
		else if (is_numeric($value) && strpos($value, "0") !== 0) {
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