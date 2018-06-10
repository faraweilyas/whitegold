<?php

    use Faker\Factory;
	use Blaze\Http\Secure;
	use Blaze\Http\Session;
    use Blaze\Pagination\Paginate;

	$secure 	= new Secure;
	$session 	= new Session;
	$template 	= new Template;
	$paginate 	= new Paginate;
    $faker 		= Faker\Factory::create("ng_NG");