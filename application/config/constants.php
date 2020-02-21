<?php
defined('BASEPATH') OR exit('No direct script access allowed');

defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

define('VIGENTE', 1);

define('ADMINISTRADOR', 1);
define('VENDEDOR', 2);
define('CLIENTE', 3);
define('NULO', 0);

define('PAGO_PAYPAL', 4);
define('ERROR_PAYPAL', 1);
define('SI', 1);
define('NO', 0);

define('SIN_VERIFICAR', 2);
define('PAGO_VERIFICADO', 3);
define('ENVIADO', 4);
define('RECIBIDO', 5);

defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define("KEY", "yoygeem");
define("CODE", "AES-128-CBC");

define("SANDBOX_ID", "AUkS_CZjrIbTs8VBGI6DMlGYlCKPx6kD3mmai8b26yBfC6odKwPAgXm3BbMoDh8tPSWEa3lncUiZoxNC");
define("SANDBOX_SECRET", "EHGPk70uoc_GUcT8g9UdHY4hRI4HgrYictcIEEAG5vJvP2Au48BL0GL0rBQ3TrRlJsJgljypkrdUTfqI");
// define("SANDBOX_SECRET", "TEST PARA PROBAR ERRORES DE VENTA");

define("LIVE_ID", "AZxD_NRo_2G2F4WI3_sNF7W_dY-bx6wG_0PtLlXyroDEhQ_1OapZtRzZrHy5ojkMPiZJIOrdljr2qwgL");
define("LIVE_SECRET", "EMd0La4XDWpSITErPfYnBnBqETDa1_0-5vy4Qo09qkMQEaitUI6YjcosCGNNteiU9WhIhYkTtud30XzK");

define("TOKEN_URL", "https://api.sandbox.paypal.com/v1/oauth2/token");