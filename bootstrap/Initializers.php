<?php

use App\Start\Route;
use Blaze\Http\Secure;
use App\Start\Template;
use Blaze\Http\Session;
use Blaze\Pagination\Paginate;

$secure 				= new Secure;
$session 				= new Session(
	getConstant("SESSION_EXPIRE", TRUE),
	getConstant("SESSION_PATH", TRUE),
	getConstant("SESSION_DOMAIN", TRUE),
	getConstant("SESSION_SECURE", TRUE),
	getConstant("SESSION_HTTPONLY", TRUE)
);
$template 				= new Template;
$paginate 				= new Paginate;
$routeState 			= Route::activateAbsoluteRoute();
