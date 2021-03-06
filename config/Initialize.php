<?php

use App\Enhancers\Route;

// SETTING NEEDED CONSTANTS FOR APPLICATION SETUP
defined('ENV_OVERLOAD') 		? NULL : define('ENV_OVERLOAD', 		FALSE);
defined('ENV_FILE') 			? NULL : define('ENV_FILE', 			"");

// PROFILING
defined('AUTHORS') 				? NULL : define('AUTHORS', 				["iLyas Farawe"]);
defined('APP_NAME') 			? NULL : define('APP_NAME',				"whiteGold");
defined('COMPANY') 				? NULL : define('COMPANY',				"");

// SESSION CONFIGURATION
defined('SESSION_EXPIRE') 		? NULL : define('SESSION_EXPIRE', 		NULL);
defined('SESSION_PATH') 		? NULL : define('SESSION_PATH', 		NULL);
defined('SESSION_DOMAIN') 		? NULL : define('SESSION_DOMAIN', 		NULL);
defined('SESSION_SECURE') 		? NULL : define('SESSION_SECURE', 		NULL);
defined('SESSION_HTTPONLY') 	? NULL : define('SESSION_HTTPONLY', 	NULL);

// DIRECTORIES
defined('APP') 					? NULL : define('APP', 					ROOT."app".DS);
defined('BOOTSTRAP') 			? NULL : define('BOOTSTRAP', 			ROOT."bootstrap".DS);
defined('CONFIG') 				? NULL : define('CONFIG', 				ROOT."config".DS);
defined('RESOURCE') 			? NULL : define('RESOURCE', 			ROOT."resources".DS);
defined('STORAGE') 				? NULL : define('STORAGE', 				ROOT."storage".DS);

defined('CONTROLLERS') 			? NULL : define('CONTROLLERS', 			APP."Controllers".DS);
defined('ENHANCERS') 			? NULL : define('ENHANCERS', 			APP."Enhancers".DS);
defined('MODELS') 				? NULL : define('MODELS', 				APP."Models".DS);
defined('ROUTES') 				? NULL : define('ROUTES', 				APP."Routes".DS);

defined('VIEW') 				? NULL : define('VIEW', 				RESOURCE."views".DS);
defined('LAYOUT') 				? NULL : define('LAYOUT', 				RESOURCE."layouts".DS);
defined('TEMPLATE') 			? NULL : define('TEMPLATE', 			LAYOUT."templates".DS);

defined('SESSION') 				? NULL : define('SESSION', 				STORAGE."sessions");
defined('COOKIE') 				? NULL : define('COOKIE', 				STORAGE."cookies".DS);

defined('ASSETS') 				? NULL : define('ASSETS', 				PUBLIC_DIR."assets".DS);
defined('LOG') 					? NULL : define('LOG', 					PUBLIC_DIR."logs".DS);
defined('UPLOAD') 				? NULL : define('UPLOAD', 				PUBLIC_DIR."uploads".DS);

defined('UPLOAD_IMG') 			? NULL : define('UPLOAD_IMG', 			UPLOAD."images".DS);
defined('UPLOAD_AUDIO') 		? NULL : define('UPLOAD_AUDIO', 		UPLOAD."audio".DS);
defined('UPLOAD_VID') 			? NULL : define('UPLOAD_VID', 			UPLOAD."videos".DS);
defined('UPLOAD_FILE') 			? NULL : define('UPLOAD_FILE', 			UPLOAD."files".DS);

defined('CSS') 					? NULL : define('CSS', 					ASSETS."css".DS);
defined('IMAGE') 				? NULL : define('IMAGE', 				ASSETS."images".DS);
defined('JS') 					? NULL : define('JS', 					ASSETS."javascript".DS);

// Load functions to override default defined functions.
require_once BOOTSTRAP."OverloadFunctions.php";

// Require composer autoload
require_once __DIR__.'/../vendor/autoload.php';

// LOAD BASIC PHP & APP CONFIGURATIONS.
require_once CONFIG."Configure.php";

// REQUIRE INITIALIZERS FILE.
require_once BOOTSTRAP."Initializers.php";

// INCLUSION OF ROUTES FILES FOR ROUTING THE APP
requireMultipleFiles(array_merge([APP."routes.php"], getFiles(ROUTES, TRUE)));

// INITIALIZE THE ROUTER FOR ROUTES PROCESSING.
Route::initialize();
