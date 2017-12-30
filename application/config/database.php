<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$active_group = 'default';
$query_builder = TRUE;

switch($_SERVER['SERVER_NAME'])
{
	case 'billman.local':
		$database = 'tssnetin_billman_testing';
		$username = 'root';
		$passowrd = 'tss';
		$hostname = 'localhost';
		/*$database = 'tssnetin_airport';
		$username = 'tssnetin_webroot';
		$passowrd = 'MwDpI0118$';
		$hostname = 'tss.net.in';*/
		break;
	case 'cloudbpp.com':
		$database = 'tssnetin_billman_testing';
		$username = 'tssnetin_webroot';
		$passowrd = 'MwDpI0118$';
		$hostname = 'tss.net.in';
	break;
	default:
		$database = 'tssnetin_billman';
		$username = 'tssnetin_webroot';
		$passowrd = 'MwDpI0118$';
		$hostname = 'tss.net.in';
		break;
}


$db['default'] = array(
	//'dsn'	=> '',
	'dsn'	=> 'mysql:host='.$hostname.';dbname='.$database,
	'hostname' => $hostname,
	'username' => $username,
	'password' => $passowrd,
	'database' => $database,
	//'dbdriver' => 'mysqli',
	'dbdriver' => 'pdo',
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
