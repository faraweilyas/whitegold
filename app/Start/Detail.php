<?php

namespace App\Start;

use Blaze\Details;

/**
* Detail Class
*/
class Detail extends Details
{
	/**
	* Gets the Page Title.
	* @return string
	*/
	public static function title () : string
	{
		return self::$title ?? "Title is not defined";
	}

	/**
	* Gets the Page Description.
	* @return string
	*/
	public static function description () : string
	{
		return self::$description ?? "Description is not defined";
	}

	/**
	* Gets application author if it's defined.
	* @return string
	*/
	public static function author () : string
	{
		return defined('AUTHOR') ? AUTHOR : "Author is not defined";
	}
	
	/**
	* Gets application name if it's defined.
	* @return string
	*/
	public static function appName () : string
	{
		return defined('APP_NAME') ? APP_NAME : "App Name is not defined";
	}
	
	/**
	* Gets company name if it's defined.
	* @return string
	*/
	public static function company () : string
	{
		return defined('COMPANY') ? COMPANY : "Company is not defined";
	}
}
