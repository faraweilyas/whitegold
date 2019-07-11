<?php

/**
* whiteGold - mini PHP Framework
*
* @package whiteGold
* @author Farawe iLyas <faraweilyas@gmail.com>
*/

// SET RESOURSES USAGE START
define ('RESOURCE_USAGE_START', 	getrusage());

// DEFINE CONSTANT DEPLOYMENT_STATE TO 'local' / 'production'
// FOR PHP CONFIGURATION PURPOSES
define ('DEPLOYMENT_STATE',			'local');

// DEFINE CONSTANT UNDER CONSTRUCTION
define ('UNDER_CONSTRUCTION',		FALSE);

// DEFINE CONSTANT TO MINIFY HTML OUTPUT
define ('MINIFY_HTML_OUTPUT',   	TRUE);

// REQUIRE INITIALIZATION FILE FOR APP CONFIGURATION
require_once __DIR__."/../config/Initialize.php";
