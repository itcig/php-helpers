<?php
/**
 * Common string functions
 *
 * @package itcig/php-helpers
 */

namespace Cig;

/**
 * Concvert a string to camelCase.
 *
 * @param string $string The string to be converted.
 *
 * @return string
 */
function str_to_camel_case(string $string): string {
    $words = str_to_words($string, true, true);
    if (empty($words)) {
        return '';
    }
    $string = array_shift($words) . implode('', array_map('ucfirst', $words));
    return $string;
}

/**
 * Convert a string to kebab-case.
 *
 * @param string $string The string to be converted.
 * @param string $glue The string used to glue the words together.
 * @param bool   $lower Whether the string should be lowercased.
 * @param bool   $remove_punctuation Whether punctuation marks should be removed.
 *
 * @return string The kebab-cased string
 */
function str_to_kebab_case(
    string $string,
    string $glue = '-',
    bool $lower = true,
    bool $remove_punctuation = true
): string {
    $words = str_to_words($string, $lower, $remove_punctuation);
    return implode($glue, $words);
}

/**
 * Convert a string to PascalCase.
 *
 * @param string $string The string to be converted.
 *
 * @return string
 */
function str_to_pascal_case(string $string): string {
    $words = str_to_words($string, true, true);
    $string = implode('', array_map('ucfirst', $words));
    return $string;
}

/**
 * Convert a string to snake_case.
 *
 * @param string $string The string to be converted.
 * @param bool   $lower True if you want all words converted to lower-case.
 *
 * @return string
 */
function str_to_snake_case(string $string, bool $lower = true): string {
    $words = str_to_words($string, $lower, true);
    return implode('_', $words);
}

/**
 * Make camelCase, Pascal_Case, snake_case, and kebab-case human-readable.
 *
 * @param string $string The string to be converted.
 *
 * @return string
 */
function str_to_human_readable(string $string): string {
    $words = str_to_words($string, false, true);
    $string = implode(' ', $words);
    return $string;
}

/**
 * Filters empty strings from an array.
 *
 * @param array $arr An array of strings.
 *
 * @return array
 */
function filter_empty_strings_from_array(array $arr): array {
    return array_filter($arr, function ($value): bool {
        return $value !== '';
    });
}

/**
 * Splits a string into an array of the words in the string.
 *
 * @param string $string The string to be converted.
 *
 * @return string[] The words in the string.
 */
function split_on_words(string $string): array {
    // Split on anything that is not alphanumeric, or a period, underscore, or hyphen.
    // Reference: http://www.regular-expressions.info/unicode.html
    preg_match_all('/[\p{L}\p{N}\p{M}\._-]+/u', $string, $matches);
    return filter_empty_strings_from_array($matches[0]);
}

/**
 * Returns an array of words extracted from a string.
 *
 * @param string $string The string to be converted.
 * @param bool   $lower Whether the returned words should be lower case.
 * @param bool   $remove_punctuation Whether punctuation should be removed from the returned words.
 *
 * @return string[] The prepped words in the string
 */
function str_to_words(string $string, bool $lower = false, bool $remove_punctuation = false): array {
    // Convert CamelCase to multiple words
    // Regex copied from Inflector::camel2words(), but without dropping punctuation
    $string = preg_replace('/(?<!\p{Lu})(\p{Lu})|(\p{Lu})(?=\p{Ll})/u', ' \0', $string);

    if ($lower) {
        // Make it lowercase
        $string = mb_strtolower($string);
    }

    if ($remove_punctuation) {
        $string = str_replace(['.', '_', '-'], ' ', $string);
    }

    // Remove inner-word punctuation.
    $string = preg_replace('/[\'"‘’“”\[\]\(\)\{\}:]/u', '', $string);

    // Split on the words and return
    return split_on_words($string);
}

/**
 * Convert HTML line breaks to CRLF.
 *
 * @param string $string The input string of HTML.
 *
 * @return string The converted output HTML.
 */
function br2nl($string) {
    $string = preg_replace("/(<\/?(br)\s*\/?>\n*\s*){3,}/s", '<br /><br />', $string);
    $string = str_replace('<br /><br />', "\n\n", $string);
    $string = str_replace('<br />', "\n", $string);

    return $string;
}
