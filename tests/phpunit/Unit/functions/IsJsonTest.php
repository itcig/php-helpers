<?php


namespace Cig\Tests\Unit\Functions;

class IsJsonTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\is_json()
	 */
	public function test_is_json(): void {
//		$json_string = `'{"name":"John", "age":30, "car":no}'`;

//		$result = \Cig\is_json($json_string);

//		self::assertIsBool($result);
//		self::assertTrue($result);

		//TODO: is this only files/documents or an actual json string?
		self::markTestSkipped('**WIP** Revisit - json is coming back false on json strings');
	}

	/**
	 * @covers ::\Cig\is_json()
	 */
	public function test_is_not_json(): void {
		$string = `not a jason string`;

		$result = \Cig\is_json($string);

		self::assertIsBool($result);
		self::assertFalse($result);

		self::markTestSkipped('**WIP** Revisit');
	}
}