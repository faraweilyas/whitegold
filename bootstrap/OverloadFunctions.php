<?php

use Blaze\RouterEngine\Router;

/**
* Alternative function for proper file inclusion.
* Appends last time file was modified to avoid caching for CSS and JS files by passing a call back function
* @param string $file
* @param bool $return
* @return mixed
*/
function __file ($file='', bool $return=TRUE)
{
	return Router::_file(preventFileCaching($file), $return);
}
