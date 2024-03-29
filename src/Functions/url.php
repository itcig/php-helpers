<?php
/**
 * Common URL functions
 *
 * @package itcig/php-helpers
 */

namespace Cig;

/**
 * Get the current URL
 *
 * @return string|null
 */
function current_url(): ?string {
  // Return null if not an http request
    if (!isset($_SERVER['SERVER_NAME']) || empty($_SERVER['REQUEST_URI'])) {
        return null;
    }

    $ssl = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';
    $sp = strtolower($_SERVER['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . ($ssl ? 's' : '');

    // This is borrowed from wp-rocket
    $port = (int) $_SERVER['SERVER_PORT'];
    $port = 80 !== $port && 443 !== $port ? ":$port" : '';

    $host = !empty($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] . $port : $_SERVER['HTTP_HOST'];

    return "$protocol://$host{$_SERVER['REQUEST_URI']}";
}

/**
 * Get just the path without querystring of a given or current URL.
 *
 * @param string|null $url URL to parse.
 *
 * @return string|null URL path if exists
 */
function url_path(?string $url = null): ?string {
    return parse_url($url ?? current_url(), PHP_URL_PATH);
}

/**
 * Convert URL's quersytring to an array.
 *
 * @param string|void $url Full URL to parse querystring from.
 *
 * @return array|null Associative array of querystring params
 */
function parse_querystring(?string $url = null): ?array {
    $qs_array = [];

    parse_str(parse_url($url ?? (current_url() ?? ""), PHP_URL_QUERY) ?? "", $qs_array);

    return !empty($qs_array) ? $qs_array : null;
}

/**
 * Compare two URLs and assert if their hostname is the same.
 *
 * @param string      $url The control URL to compare against.
 * @param string|null $url2 Comparison URL. Uses current url if null.
 *
 * @return bool
 */
function is_same_hostname(string $url, ?string $url2 = null): bool {
  // If no URL or server request, return false
    if (empty($url2) && empty(current_url())) {
        return false;
    }

    return parse_url($url, PHP_URL_HOST) === parse_url($url2 ?? current_url(), PHP_URL_HOST);
}

/**
 * Strip a URL down to just the bare domain without subdomains.
 *
 * @param string|null $url Any full URL to extract the domain. Uses current REQUEST_URI if null.
 *
 * @return string|null Root domain plus TLD.
 */
function get_root_domain(?string $url = null): ?string {
  // Get hostname
    $host = parse_url($url ?? current_url(), PHP_URL_HOST);

  // Parse subdomains out of host
    if (preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $host, $regs)) {
        $host = $regs['domain'];
    }

    return $host;
}

/**
 * Compare two URLs and assert if their root domain is the same.
 *
 * @param string      $url The control URL to compare domains against.
 * @param string|null $url2 Comparison URL. Uses current url if null.
 *
 * @return bool
 */
function is_same_root_domain(string $url, ?string $url2 = null): bool {
  // If no URL or server request, return false
    if (empty($url2) && empty(current_url())) {
        return false;
    }

    return get_root_domain($url) === get_root_domain($url2 ?? current_url());
}

/**
 * Append or overwrite querystring values to a URL
 *
 * @param array       $qs_params Array of data to append or modify on the URLs querystring.
 * @param string|null $url A fully-qaulified URI or use the current URL if none passed.
 *
 * @return string
 */
function url_modify_querystring(array $qs_params, ?string $url): string {
    $base_url = strtok($url ?? current_url(), "?");

    $existing_qs = parse_querystring($url) ?? [];

    $final_qs_data = array_merge($existing_qs, $qs_params);

    if (!empty($final_qs_data)) {
        $new_url = $base_url . "?" . http_build_query($final_qs_data);
    } else {
        $new_url = $base_url;
    }

    return $new_url;
}

/**
 * Check a passed in URL for a specified key in the query string
 *
 * @param string $key The key to search for
 * @param string $url The URL containing the query string
 * @return bool Whether a query string contains a specified key
 */
function query_string_contains_key(string $key, string $url): bool {
    $parsed_qs = \Cig\parse_querystring($url);
    return isset($parsed_qs[$key]);
}

/**
 * Search a query string for specified keys and if found, update their value's to the passed in key's values
 * If the key is not found in the query string the key and value will not be added unlike \Cig\url_modify_querystring()
 *
 * @param array  $params List of key value pairs to update in the query string
 * @param string $url The URL containing the query string
 * @return string If matching keys are found their value's will be update; otherwise the original URL will be returned unchanged
 */
function update_existing_query_string_keys_values(array $params, string $url): string {
    $param_keys = array_keys($params);
    $updated_url = $url;
    for ($i = 0, $imax = count($params); $i < $imax; $i++) {
        $assoc_key = $param_keys[$i];
        $updated_url = \Cig\update_existing_query_string_key_value($assoc_key, $params[$assoc_key], $updated_url);
    }
    return $updated_url;
}

/**
 * If a query string contains the specified key, update it's value; otherwise return the original URL
 *
 * @param string $key The key who's value will be updated
 * @param string $value The new value for the passed in key
 * @param string $url The string that may contain the passed in query string key
 * @return string If the passed in URL contains the passed in key it will have the passed in
 *                value associated to it; otherwise the passed in url is returned unchanged
 */
function update_existing_query_string_key_value(string $key, string $value, string $url): string {
    return \Cig\query_string_contains_key($key, $url) ? \Cig\url_modify_querystring([$key => $value], $url) : $url;
}
