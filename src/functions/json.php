<?php

namespace Cig;

/**
 * Fix default json_encode where JSON_NUMERIC_CHECK will break with octals and numeric strings beginning with +/0.
 *
 * For example a phone number string +1234567890 or zipcode 01234 will attempt to convert to an octal when it should be left as a string.
 *
 * @param mixed $value The value being encoded.
 * @param int $options Bitmask consisting of constants described on the JSON constants page. (optional)
 * @param int $depth Set the maximum depth. Must be greater than zero. (optional)
 *
 * @return string|false a JSON encoded string on success or FALSE on failure.
 */
function json_encode_numeric($value, $options = 0, $depth = 512): string {
	// Recursively check all values in array or run on single value for scalars
	if (is_array($value)) {
		array_walk_recursive($value, '\\Cig\\json_parse_numeric');
	} else {
		json_parse_numeric($value);
	}

	return \json_encode($value, $options, $depth);
}

/**
 * If string value is numeric and does NOT begin with +/0 then parase as a float/int
 *
 * @param mixed $value
 *
 * @return mixed
 */
function json_parse_numeric(&$value) {
	if (is_string($value) && is_numeric($value)) {
		// check if value doesn't starts with 0 or +
		if (!preg_match('/^[0\+]+/', $value)) {
			// cast $value to int or float
			$value += 0;
		}
	}

	return $value;
}

/**
 * @param mixed $json_string The JSON document
 *
 * @return bool True if valid JSON
 */
function is_json($json_string): bool {
	if (!is_string($json_string)) {
		return false;
	}

	json_decode($json_string);
	return (json_last_error() === JSON_ERROR_NONE);
}