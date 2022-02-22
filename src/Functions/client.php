<?php
/**
 * Common client functions
 *
 * For interfacing with the client making HTTP requests to the webserver
 *
 * @package itcig/php-helpers
 */

namespace Cig;

/**
 * Get the IP address of the client from the request. Look for standard forwarding headers set by proxies like Nginx ingress servers first.
 *
 * @return string IP address.
 */
function get_client_ip(): ?string {
    return $_SERVER['HTTP_CLIENT_IP'] ??
    ($_SERVER['HTTP_X_REAL_IP'] ?? ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? ($_SERVER['REMOTE_ADDR'] ?? null)));
}

/**
 * Get the User-Agent of the client from the request.
 *
 * @return string The User-Agent string.
 */
function get_user_agent(): ?string {
    return $_SERVER['HTTP_USER_AGENT'] ?? null;
}
