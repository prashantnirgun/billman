<?php
defined('BASEPATH') OR exit('No direct script access allowed');
setlocale(LC_MONETARY, 'en_IN');
/*
|--------------------------------------------------------------------------
| Site Name
|--------------------------------------------------------------------------
|
|
*/
$config['site_name']='Billman';

/*
|--------------------------------------------------------------------------
| Site Open
|--------------------------------------------------------------------------
| If site is down for maintenance for general public then use FALSE
|
*/
$config['site_open']=TRUE;
$config['table_prefix'] ="";
$config['upload_path'] =  "uploads/billman/";
$config['otp_expiry'] =  "+5 minutes";
/*
|--------------------------------------------------------------------------
| admin_theme
|--------------------------------------------------------------------------
|
|
*/
switch($_SERVER['SERVER_NAME'])
{
	case 'billman.local':
		$config['admin_theme']= "adminlte";
		//$config['admin_theme']= "basic";
		$config['sub_admin_theme']= "public";
		break;
	case 'cloudbpp.com':
		$config['admin_theme']= "adminlte";
		//$config['admin_theme']= "basic";
		$config['sub_admin_theme']= "public";
		break;
	default:
		$config['admin_theme']= "adminlte";
		break;
}


/*
|--------------------------------------------------------------------------
| Meta Description
|--------------------------------------------------------------------------
| Meta Tag : meta_description used for SEO
|
*/
$config['meta_description'] = "Awasome Site";

/*
|--------------------------------------------------------------------------
| Met Keywords
|--------------------------------------------------------------------------
| Meta Tag : meta_keywords used for SEO
|
*/
$config['meta_keywords'] = "Awasome Site";

/*
|--------------------------------------------------------------------------
| Met author
|--------------------------------------------------------------------------
| Meta Tag : auther used for SEO
|
*/
$config['author'] = "The Software Source";
