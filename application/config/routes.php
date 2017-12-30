<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['self_user_creation'] = 'login/self_user_creation';
$route['forgot_password'] = 'login/forgot_password';
$route['reset_password'] = 'login/reset_password';
$route['login_check'] = 'login/login_check';


$route['column_property'] 	= 'column_properties/column_property';
$route['client_column_property/(:any)/(:any)'] 	= 'column_properties/client_column_property/$1/$2';

$route['user_group'] = 'users/user_group';
$route['user'] = 'users/user';
$route['user/(:any)/(:any)'] = 'users/user/$1/$2';
$route['user_profile'] 	= 'users/user_profile';

$route['acl'] = 'users/acl';
$route['acl/(:any)'] = 'users/acl/$1';
$route['acl/(:any)/(:any)'] = 'users/acl/$1/$2';

$route['acl_user_permission'] = 'users/acl_user_permission';
$route['acl_user_permission/(:any)'] = 'users/acl_user_permission/$1';
$route['acl_user_permission/(:any)/(:any)'] = 'users/acl_user_permission/$1/$2';

$route['acl_group_permission'] = 'users/acl_group_permission';
$route['acl_group_permission/(:any)'] = 'users/acl_group_permission/$1';
$route['acl_group_permission/(:any)/(:any)'] = 'users/acl_group_permission/$1/$2';

$route['city'] = 'citys/city';
$route['city/(:any)'] = 'citys/city/$1';
$route['city/(:any)/(:any)'] = 'citys/city/$1/$2';

$route['employee'] = 'employees/employee';
$route['employee/(:any)'] = 'employees/employee/$1';
$route['employee/(:any)/(:any)'] = 'employees/employee/$1/$2';

$route['attendence'] = 'employees/attendence';
$route['attendence/(:any)'] = 'employees/attendence/$1';
$route['attendence/(:any)/(:any)'] = 'employees/attendence/$1/$2';


$route['company'] = 'companys/company';
$route['company/(:any)'] = 'companys/company/$1';
$route['company/(:any)/(:any)'] = 'companys/company/$1/$2';
$route['branch/(:any)'] = 'companys/branch/$1';
$route['branch/(:any)/(:any)'] = 'companys/branch/$1/$2';

$route['country'] = 'countries/country';
$route['country/(:any)'] 				= 'countries/country/$1';
$route['country/(:any)/(:any)'] = 'countries/country/$1/$2';

$route['city/(:any)'] = 'countries/city/$1';
$route['city/(:any)/(:any)'] = 'countries/city/$1/$2';

$route['state/(:any)'] = 'countries/state/$1';
$route['state/(:any)/(:any)'] = 'countries/state/$1/$2';

$route['account_format'] = 'accounts/account_format';
$route['account_format/(:any)'] = 'accounts/account_format/$1';
$route['account_format/(:any)/(:any)'] = 'accounts/account_format/$1/$2';
$route['account_head/(:any)'] = 'accounts/account_head/$1';
$route['account_head/(:any)/(:any)'] = 'accounts/account_head/$1/$2';

$route['account_group'] = 'accounts/account_group';
$route['account_group/(:any)'] = 'accounts/account_group/$1';
$route['account_group/(:any)/(:any)'] = 'accounts/account_group/$1/$2';
$route['general_ledger'] = 'accounts/general_ledger';
$route['general_ledger/(:any)'] = 'accounts/general_ledger/$1';
$route['general_ledger/(:any)/(:any)'] = 'accounts/general_ledger/$1/$2';
$route['general_ledger_detail/(:any)/(:any)'] = 'accounts/general_ledger_detail/$1/$2';

$route['customer'] = 'accounts/customer';
$route['supplier'] = 'accounts/supplier';

$route['company'] = 'companys/company';
$route['company/(:any)/(:any)'] = 'companys/company/$1/$2';

$route['branch/(:any)/(:any)'] = 'companys/branch/$1/$2';

$route['voucher_type'] = 'voucher_types/voucher_type';
$route['voucher_type/(:any)'] = 'voucher_types/voucher_type/$1';
$route['voucher_type/(:any)/(:any)'] = 'voucher_types/voucher_type/$1/$2';
$route['voucher_type_detail/(:any)'] = 'voucher_types/voucher_type_detail/$1';
$route['voucher_type_detail/(:any)/(:any)'] = 'voucher_types/voucher_type_detail/$1/$2';

$route['voucher_type_tax/(:any)'] = 'voucher_types/voucher_type_tax/$1';
$route['voucher_type_tax/(:any)/(:any)'] = 'voucher_types/voucher_type_tax/$1/$2';

$route['narration'] = 'narrations/narration';
$route['narration/(:any)'] = 'narrations/narration/$1';
$route['narration/(:any)/(:any)'] = 'narrations/narration/$1/$2';

$route['user'] = 'users/user';
$route['user/(:any)'] = 'users/user/$1';
$route['user/(:any)/(:any)'] = 'users/user/$1/$2';

$route['user_group'] = 'users/user_group';
$route['user_group/(:any)'] = 'users/user_group/$1';
$route['user_group/(:any)/(:any)'] = 'users/user_group/$1/$2';

$route['item_category'] 				= 'items/item_category';
$route['item_category/(:any)'] = 'items/item_category/$1';
$route['item_category/(:any)/(:any)'] = 'items/item_category/$1/$2';

$route['item/(:any)'] 				= 'items/item/$1';
$route['item/(:any)/(:any)'] 		= 'items/item/$1/$2';

$route['item_tax/(:any)'] 				= 'items/item_tax/$1';
$route['item_tax/(:any)/(:any)'] 		= 'items/item_tax/$1/$2';

$route['tax_rate'] 						= 'tax_rates/tax_rate';
$route['tax_rate/(:any)'] 				= 'tax_rates/tax_rate/$1';
$route['tax_rate/(:any)/(:any)'] 		= 'tax_rates/tax_rate/$1/$2';


$route['invoice'] 						= 'invoices/invoice';
$route['invoice/(:any)'] 				= 'invoices/invoice/$1';
$route['invoice/(:any)/(:any)'] 		= 'invoices/invoice/$1/$2';

$route['report'] 			= 'reports/report';
$route['report/(:any)'] 	= 'reports/report/$1';
$route['report/(:any)/(:any)'] 	= 'reports/report/$1/$s2';

$route['form_setting'] = 'form_settings/form_setting';
$route['form_setting/(:any)'] = 'form_settings/form_setting/$1';
$route['form_setting/(:any)/(:any)'] = 'form_settings/form_setting/$1/$2';

$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
