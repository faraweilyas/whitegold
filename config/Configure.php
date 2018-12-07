<?php

use Dotenv\Dotenv;

// MODIFY THE HEADER FOR SECURITY REASONS.
header("X-Powered-By: whiteGold");

if (!empty(ENV_FILE)):
    $dotenv = new Dotenv(ROOT, ENV_FILE);
else:
	if (!file_exists(ROOT.".env")) print ("Couldn't find '.env' file, Please Create a '.env' file in the document root.");
    $dotenv = new Dotenv(ROOT);
endif;

if (!ENV_OVERLOAD):
    $dotenv->load();
else:
    $dotenv->overload();
endif;

// LOAD ENVIRONMENT VARIABLES / CONSTANTS.
require_once CONFIG."Config.php";

// VALIDATE THE DEPLOYMENT STATE.
defined('DEPLOYMENT_STATE') 	? NULL : exit ("Define application deployment state to continue application initialization");
// VALIDATE THE APP STATE.
defined('UNDER_CONSTRUCTION') 	? NULL : exit ("Define under construction state to continue application initialization");

// CHECK THE VERSION FOR COMPATIBILITY ISSUES
if (version_compare(PHP_VERSION, "7.0.0", "<")) exit ("This application only runs on PHP Version 7.0.0 or later for compatibility issues.");

// DEFAULT PHP CONFIGURATIONS
if (DEPLOYMENT_STATE === "production"):
	ini_set('log_errors', 		'on');
	ini_set('error_log', 		LOG.'errorLog.txt');
endif;

ini_set("session.gc_maxlifetime", 	"21600");
ini_set("session.save_path", 		SESSION);
ini_set('date.timezone', 			'Africa/Lagos');
date_default_timezone_set('Africa/Lagos');
