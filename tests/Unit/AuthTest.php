<?php

namespace Tests\Unit;

use Exception;
use Blaze\Auth\Auth;
use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
	public function test_can_create_new_auth_object_and_test_two_equal_strings ()
	{
		$this->assertInstanceOf(Auth::class, new Auth());
		$this->assertTrue(Auth::strictCheck("first", "first"));
	}

	public function test_can_test_two_strings_that_are_not_equal ()
	{
		$this->assertFalse(Auth::strictCheck("first", "second"));
	}
}
