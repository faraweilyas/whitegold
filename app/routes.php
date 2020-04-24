<?php

use App\Enhancers\Route;
use App\Controllers\Home;

/**
 * @routes GENERAL
 */
Route::register('/', function ()
{
	Home::homePage();
}, "Home Page");
