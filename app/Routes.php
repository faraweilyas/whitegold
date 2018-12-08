<?php

use App\Start\Route;
use App\Controller\Home\Controller;

/**
* @routes GENERAL
*/
Route::register('/', function ()
{
    Controller::homePage();
}, "Home Page");
