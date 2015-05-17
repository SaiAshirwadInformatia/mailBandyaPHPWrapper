<?php

/**
 *
 * @name Start
 * @abstract Starting point of application
 * @author Rohan Sakhale
 * @copyright saiashirwad.com
 * @since WillingTree v1
 *
 */

/**
 * Define Constants that can be used globally in entire application
 */
define('DS', DIRECTORY_SEPARATOR);
define('SAI_ABS_PATH', __DIR__ . DS);

header("Developed-By: Sai Ashirwad Informatia");
header("X-Powered-By: Sai Ashirwad Informatia");
header("Server: Sai Ashirwad Informatia Private Server");

// Tell PHP that we're using UTF-8 strings until the end of the script
mb_internal_encoding('UTF-8');

// Tell PHP that we'll be outputting UTF-8 to the browser
mb_http_output('UTF-8');

/**
 * Turn on output buffering with the gzhandler
 * This will help send compressed data from server to client
 * Note: `zlib` module is required to run gzhandler
 */
ini_set("zlib.output_compression", "On");
/*
 * if (function_exists('ob_start')) { ob_start('ob_gzhandler'); }
 */

if (file_exists('vendor' . DS . 'autoload.php')) {
    require_once 'vendor/autoload.php';
}
require_once 'src/Autoload.php';