<?php

use Blaze\Http\Secure;
use Blaze\Http\Session;
use App\Enhancers\Route;
use App\Enhancers\Template;
use Blaze\Pagination\Paginate;
use App\Enhancers\BootstrapTemplate;

$secure 				= new Secure;
$session 				= new Session(
	getConstant("SESSION_EXPIRE", TRUE),
	getConstant("SESSION_PATH", TRUE),
	getConstant("SESSION_DOMAIN", TRUE),
	getConstant("SESSION_SECURE", TRUE),
	getConstant("SESSION_HTTPONLY", TRUE)
);
$template 				= new Template;
$paginate 				= (new Paginate)->setTemplate(new BootstrapTemplate);
$routeState 			= Route::activateAbsoluteRoute();
