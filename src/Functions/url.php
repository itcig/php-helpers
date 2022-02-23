<?php
/**
 * Common URL functions
 *
 * @package itcig/php-helpers
 */

namespace Cig;

/**
 * Get theh current URL.
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

    $port =
    (!$ssl && $_SERVER['SERVER_PORT'] === '80') || ($ssl && $_SERVER['SERVER_PORT'] === '443')
      ? ''
      : ':' . $_SERVER['SERVER_PORT'];

    $host = !empty($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] . $port : $_SERVER['HTTP_HOST'];

    return $protocol . '://' . $host . $_SERVER['REQUEST_URI'];
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
