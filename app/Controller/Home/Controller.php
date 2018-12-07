<?php

namespace App\Controller\Home;

use App\Start\View;

/**
* App\Controller\Home Controller Class
*/
class Controller
{
	/**
	* Handles the home page route.
	* @return void
	*/
	public static function homePage ()
	{
    	$title          = APP_NAME;
	    $description    = "whiteGold is a PHP light web application framework with sophisticated syntax and this is inspired by the Laravel Framework with the aim to ease the way components are being installed alongside our project which disrupts scaling and development process. whiteGold attempts to tackle this by tearing down components to make them stand alone so it's easy to remove, add and update different components at any point in time.";
		View::make("home", get_defined_vars());
	}
}
