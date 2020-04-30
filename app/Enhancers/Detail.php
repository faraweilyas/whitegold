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
		if (defined('AUTHORS')):
			return is_array(AUTHORS) ? implode(", ", AUTHORS) : AUTHORS;
		else:
			return "Author is not defined";
		endif;
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
	 * Getter for company name.
	 * @return string
	 */
	public function company() : string
	{
		return defined('COMPANY') ? COMPANY : "Company is not defined";
	}
}
