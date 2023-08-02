<?php

//--------------------------------------------------------------------
// App Namespace
//--------------------------------------------------------------------
// This defines the default Namespace that is used throughout
// CodeIgniter to refer to the Application directory. Change
// this constant to change the namespace that all application
// classes should use.
//
// NOTE: changing this will require manually modifying the
// existing namespaces of App\* namespaced-classes.
//
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
  |--------------------------------------------------------------------------
  | Composer Path
  |--------------------------------------------------------------------------
  |
  | The path that Composer's autoload file is expected to live. By default,
  | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
  |--------------------------------------------------------------------------
  | Timing Constants
  |--------------------------------------------------------------------------
  |
  | Provide simple ways to work with the myriad of PHP functions that
  | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR') || define('HOUR', 3600);
defined('DAY') || define('DAY', 86400);
defined('WEEK') || define('WEEK', 604800);
defined('MONTH') || define('MONTH', 2592000);
defined('YEAR') || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
  |--------------------------------------------------------------------------
  | Exit Status Codes
  |--------------------------------------------------------------------------
  |
  | Used to indicate the conditions under which the script is exit()ing.
  | While there is no universal standard for error codes, there are some
  | broad conventions.  Three such conventions are mentioned below, for
  | those who wish to make use of them.  The CodeIgniter defaults were
  | chosen for the least overlap with these conventions, while still
  | leaving room for others to be defined in future versions and user
  | applications.
  |
  | The three main conventions used for determining exit status codes
  | are as follows:
  |
  |    Standard C/C++ Library (stdlibc):
  |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
  |       (This link also contains other GNU-specific conventions)
  |    BSD sysexits.h:
  |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
  |    Bash scripting:
  |       http://tldp.org/LDP/abs/html/exitcodes.html
  |
 */
defined('EXIT_SUCCESS') || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


defined('PATHSITE') || define('PATHSITE', "https://www.uaau.digital/dev/vaiseraqui/"); // highest automatically-assigned error code 
defined('PATHSITE2') || define('PATHSITE2', "https://www.uaau.digital/dev/vaiseraqui"); // highest automatically-assigned error code 
defined('PATHHOME') || define('PATHHOME', "/var/www/clients/client5/web16/web/dev/vaiseraqui/"); // highest automatically-assigned error code
// echo getcwd();

defined('FRENETKEY') || define('FRENETKEY', "jean.adriel@gmail.com");
defined('FRENETPASS') || define('FRENETPASS', "b8Mz+FFTk4xMVhr7a8xPlQ==");
defined('FRENETTOKEN') || define('FRENETTOKEN', "474F3EBBR4BEBR474AR9D4BR57F9DA2A2F92");
defined('FRENETURL') || define('FRENETURL', "http://services.frenet.com.br/logistics/ShippingQuoteWS.asmx");


//defined('MERCADOPAGOKEY') || define('MERCADOPAGOKEY', "APP_USR-8ec5c48c-b98e-4032-980b-5e5a14776b06");
//defined('MERCADOPAGOTOKEN') || define('MERCADOPAGOTOKEN', "APP_USR-7182042201718740-071914-ee546f9b17422551bc5dd7282caa6ca5-250220234");

defined('MERCADOPAGOKEY') || define('MERCADOPAGOKEY', "TEST-9b0cc2f4-7aaf-4b47-8747-51e9cc7eee1e");
defined('MERCADOPAGOTOKEN') || define('MERCADOPAGOTOKEN', "TEST-7182042201718740-071914-1180e58ead299e602a3713acfe4bf213-250220234");