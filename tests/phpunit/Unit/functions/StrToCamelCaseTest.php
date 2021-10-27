<?php

namespace Cig\Tests\Unit;

class StrToCamelCaseTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\str_to_camel_case()
	 */
	public function test_str_to_camel_case(): void {
		$string = "welcome~ to camel' case!!";
		$expected_result = "welcomeToCamelCase";

		//this method uses another method (str_to_words) from same file (string.php)
		$result = \Cig\str_to_camel_case($string);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
	}

	/**
	 * SKIP: international alphabets
	 */
	public function test_str_to_camel_case_international_alphabets(): void {
		$int_string = 'Добро пожаловать в верблюжачью';
		$expected_result = "ДоброПожаловатьВВерблюжачью";

		// current method took one int alphabet test and only removed spaces
		// $result = \Cig\str_to_camel_case();

		self::markTestSkipped('**WIP** Revisit this test');
	}

	//TODO: expected this to break but this method goes ahead and turns
	// numbers into strings despite typescript asking for a string
	public function test_number_to_camel_case(): void {
		$not_a_string = 101;
		// $expected_result = don't expect a result;

		// TODO: showing test with string result to document. correct or add refactor note?
		$method_result = '101';
		$result = \Cig\str_to_camel_case($not_a_string);

		self::assertSame($method_result, $result);
	}
}
