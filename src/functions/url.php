<?php

namespace Cig;


function current_url() : string {
	$ssl = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';

	$sp = strtolower($_SERVER['SERVER_PROTOCOL']);

	$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');

	$port = ((!$ssl && $_SERVER['SERVER_PORT'] === '80') || ($ssl && $_SERVER['SERVER_PORT'] === '443') ) ? '' : ':' . $_SERVER['SERVER_PORT'];

	$host = $_SERVER['SERVER_NAME'] . $port;

	return $protocol . '://' . $host . $_SERVER['REQUEST_URI'];
}


/**
 * @param string|void $url Full URL to parse querystring from
 *
 * @return array Associative array of querystring params
 */
function parse_querystring(?string $url = null) : array {
	$qs_array = [];

	parse_str(parse_url($url ?? $_SERVER['REQUEST_URI'], PHP_URL_QUERY), $qs_array);

	return $qs_array;
}

/**
 * Strip a Url down to just the bare domain without subdomains
 *
 * @param string|null $url Any full URL to extract the domain. Uses current REQUEST_URI if null.
 *
 * @return string Root domain plus TLD
 */
function get_root_domain(?string $url = null) : ?string {

	// Get hostname
	$host = parse_url($url ?? current_url(), PHP_URL_HOST);

	// Parse subdomains out of host
	if (preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $host, $regs)) {
		$host = $regs['domain'];
	}

	return $host;
}

/**
 * Compare two URLs and assert if their root domain is the same
 *
 * @param string $url The control URL to compare against
 * @param string|null $url2 Comparison URL. Uses current REQUEST_URI if null.
 *
 * @return bool
 */
function is_same_root_domain(string $url, ?string $url2 = null) : bool {
	return get_root_domain($url) === get_root_domain($url2 ?? $_SERVER['REQUEST_URI']);
}