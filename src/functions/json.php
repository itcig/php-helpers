<?php

namespace Cig;

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