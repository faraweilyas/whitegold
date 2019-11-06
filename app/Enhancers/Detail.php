<?php

namespace App\Enhancers;

use Blaze\Details;

/**
 * Detail Class
 */
class Detail extends Details
{
	/**
	 * Getter for application author.
	 * @return string
	 */
	public function author() : string
	{
		return defined('AUTHOR') ? AUTHOR : "Author is not defined";
	}
	
	/**
	 * Getter for application name.
	 * @return string
	 */
	public function appName() : string
	{
		return defined('APP_NAME') ? APP_NAME : "APP Name is not defined";
	}
	
	/**
	 * Getter for short application name.
	 * @return string
	 */
	public function shortAppName() : string
	{
		return defined('SHORT_APP_NAME') ? SHORT_APP_NAME : "Short app Name is not defined";
	}
	
	/**
	 * Getter for company name.
	 * @return string
	 */
	public function company() : string
	{
		return defined('COMPANY') ? COMPANY : "Company is not defined";
	}
}
