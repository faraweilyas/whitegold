<?php

use App\Start\Route;
use App\Controller\Home;

/**
* @routes GENERAL
*/
Route::register('/', function ()
{
	Home::homePage();
}, "Home Page");
