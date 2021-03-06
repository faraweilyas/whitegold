<?php

namespace App\Controllers;

use App\Enhancers\View;

/**
 * App\Controllers\Home Class
 */
class Home
{
	/**
	 * Handles the home page route.
	 * @return void
	 */
	public static function homePage()
	{
    	$title          = APP_NAME;
	    $description    = "whiteGold is a PHP light web application framework with sophisticated syntax and this is inspired by the Laravel Framework with the aim to ease the way components are being installed alongside our project which disrupts scaling and development process. whiteGold attempts to tackle this by tearing down components to make them stand alone so it's easy to remove, add and update different components at any point in time.";
	    detail($title, $description);
		View::make("home", get_defined_vars());
	}
}
