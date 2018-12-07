<?php

use App\Start\View;
use App\Start\Route;
use App\Controller\Home\Controller;

/**
* @routes GENERAL
*/
Route::register('/', function ()
{
    Controller::homePage();
}, "Home Page");

/**
* @routes MISC
*/
Route::register('/infophp', function ()
{
    phpinfo();
}, "PHP Information");

Route::register('/test', function ()
{
	View::make('test');
}, "Test");

Route::register('/coming', function ()
{
    View::make('AppStates.coming');
}, "Coming");

Route::register('/401', function ()
{
    View::make('AppStates.401');
}, "401");

Route::register('/500', function ()
{
    View::make('AppStates.500');
}, "500");
