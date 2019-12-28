<?php

namespace App\Enhancers;

use Blaze\Pagination\BaseTemplate;

/**
 * whiteGold - mini PHP Framework
 *
 * @package whiteGold
 * @author Farawe iLyas <faraweilyas@gmail.com>
 * @link https://faraweilyas.com
 *
 * BootstrapTemplate Class
 * Uses default Bootstrap 3 HTML structure for links.
 */
class BootstrapTemplate extends BaseTemplate
{
	public $prefix = "<nav><ul>";
	public $postfix = "</ul></nav>";
	public $previousLink = "<li><a href='%s'>Previous</a></li>";
	public $nextLink = "<li><a href='%s'>Next</a></li>";
	public $elipsesLink = "<li><a href='#'>...</a></li>";
	public $activeLink = "<li><a href='#'><b>%d</b></a></li>";
	public $link = "<li><a href='%s'>%d</a></li>";

	/**
	 * Refine link.
	 * @param string $generatedLink
	 * @return string
	 */
	public function refineLink(string $generatedLink) : string
	{
		return $generatedLink;
	}
}
