<?php

namespace Cig\Tests\Integration;

class ExampleTest extends \Cig\Tests\Integration\BaseTestCase {
	/**
	 * Optional. Prepares the test environment before each test.
	 */
	protected function setUp(): void {
		parent::setUp();
	}

	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function test_example(): void {
		self::assertTrue(TRUE);
	}
}
