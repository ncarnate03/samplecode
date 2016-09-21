<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../lib/yii-1.1.16/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
date_default_timezone_set('Asia/Calcutta');
ini_set("display_errors", true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config);
//Global constants
defined('THEME_URL') or define('THEME_URL', Yii::app()->theme->baseUrl);
defined('CSS_URL') or define('CSS_URL', THEME_URL . '/css');
defined('JS_URL') or define('JS_URL', THEME_URL . '/js');
defined('IMG_URL') or define('IMG_URL', THEME_URL . '/img');
defined('LOGIN_URL') or define('LOGIN_URL', THEME_URL . '/login');

defined('BASE_URL') or define('BASE_URL', Yii::app()->getBaseUrl(true));
defined('HOME_URL') or define('HOME_URL', BASE_URL . '/site');

defined('USER_URL') or define('USER_URL', BASE_URL . '/user');
defined('PATIENT_URL') or define('PATIENT_URL', USER_URL . '/patients');
defined('FOLLOWUP_URL') or define('FOLLOWUP_URL', USER_URL . '/followups');
defined('PAYMENT_URL') or define('PAYMENT_URL', USER_URL . '/payments');


defined('ADMIN_URL') or define('ADMIN_URL', BASE_URL . '/admin');
defined('ADMIN_SPECILITIES_URL') or define('ADMIN_SPECILITIES_URL', ADMIN_URL . '/specialities');
defined('ADMIN_AREA_URL') or define('ADMIN_AREA_URL', ADMIN_URL . '/areas');
defined('ADMIN_TEST_URL') or define('ADMIN_TEST_URL', ADMIN_URL . '/tests');
defined('ADMIN_TREATMENT_URL') or define('ADMIN_TREATMENT_URL', ADMIN_URL . '/treatments');
defined('ADMIN_INVESTIGATION_URL') or define('ADMIN_INVESTIGATION_URL', ADMIN_URL . '/investigations');
defined('ADMIN_HOSPITAL_URL') or define('ADMIN_HOSPITAL_URL', ADMIN_URL . '/hospitals');
defined('ADMIN_USERS_URL') or define('ADMIN_USERS_URL', ADMIN_URL . '/users');

defined('MERCHANT_KEY') or define('MERCHANT_KEY', "FsJ5PjI5");
defined('SALT') or define('SALT', "CsA5LDmCmI");
defined('PAYU_BASE_URL') or define('PAYU_BASE_URL', "https://secure.payu.in");
defined('MERCHANT_KEY') or define('MERCHANT_KEY', "JBZaLc");

defined('STATUS_DEACTIVATE') or define('STATUS_DEACTIVATE', 0);
defined('STATUS_ACTIVE') or define('STATUS_ACTIVE', 1);
defined('STATUS_DELETE') or define('STATUS_DELETE', 2);


Yii::app()->run();
