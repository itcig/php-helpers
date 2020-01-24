<?php

namespace Cig;

function get_client_ip() {
	return  $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
}

function get_user_agent() {
	return $_SERVER['HTTP_USER_AGENT'];
}