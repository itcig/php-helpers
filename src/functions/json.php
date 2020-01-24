<?php

namespace Cig;

/**
 * @param string $json_string The JSON document
 *
 * @return bool True if valid JSON
 */
function is_json(string $json_string) : bool {
	json_decode($json_string);
	return (json_last_error() === JSON_ERROR_NONE);
}