<?php
/**
 * Common array functions
 *
 * @package itcig/php-helpers
 */

namespace Cig;

/**
 * Recursively filter an array.
 *
 * @param array    $array An array to run through the callback function.
 * @param callable $callback Callback function to run for each element in each array recursively.
 *
 * @return array An array containing all the elements that pass the callback function.
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
 * Test if an array is associative.
 *
 * @param array $arr An array to test.
 *
 * @return bool True if associative array.
 */
function is_assoc(array $arr) {
    if ([] === $arr) {
        return false;
    }
    return array_keys($arr) !== range(0, count($arr) - 1);
}

/**
 * Convert PHP arrays into Javascript object, checking for child arrays and proper variable types.
 *
 * @param array $arr An array to convert to a Javascript object.
 * @param bool  $sequential_keys True if you want indexed arrays converted into objects.
 * @param bool  $quote_all_keys If True then wrap all keys in quotation marks.
 *
 * @return string Formatted string that can be output to Javascript.
 */
function to_javascript_object(array $arr, $sequential_keys = false, $quote_all_keys = false) {
    $output = is_assoc($arr) ? '{' : '[';
    $count = 0;
    foreach ($arr as $key => $value) {
      // If $quote_keys OR key contains a non-standard JS key character then wrap in quotes
        $quote_key = $quote_all_keys || preg_match('/[^\w]+/', $key);

        if (is_assoc($arr) || (!is_assoc($arr) && $sequential_keys == true)) {
            $output .= ($quote_key ? '"' : '') . $key . ($quote_key ? '"' : '') . ': ';
        }

        if (is_array($value)) {
            $output .= to_javascript_object($value, $sequential_keys, $quote_all_keys);
        } elseif (is_bool($value)) {
          // Convert boolean to JS keyword `true|false`
            $output .= $value ? 'true' : 'false';
        } elseif (is_numeric($value) && (strpos($value, '0') !== 0 || empty($value))) {
          // Check for octal notation beginning with 0 in addition to is_numeric()
          // Also account for values that are literally 0 and keep these numeric
            $output .= $value;
        } else {
            $output .= '"' . $value . '"';
        }

        if (++$count < count($arr)) {
            $output .= ', ';
        }
    }

    $output .= is_assoc($arr) ? '}' : ']';

    return $output;
}
