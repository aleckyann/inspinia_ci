<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;


if($_SERVER['DOCUMENT_ROOT'] == '/var/www/html' || $_SERVER['DOCUMENT_ROOT'] == '/opt/lampp/htdocs' ){
	$db['default'] = array(
		'dsn'	=> '',
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '106.312.266-05',
		'database' => 'getdoctors',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => (ENVIRONMENT !== 'production'),
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE
	);
} else {
	$db['default'] = array(
		'dsn'	=> '',
		'hostname' => 'mysql796.umbler.com',
		'username' => '',
		'password' => '',
		'database' => '',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'db_debug' => (ENVIRONMENT !== 'production'),
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => FALSE,
		'stricton' => FALSE,
		'failover' => array(),
		'save_queries' => TRUE
	);
}
