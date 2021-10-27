<?php

namespace Cig\Tests\Unit;


class StrToPascalCaseTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\str_to_pascal_case()
	 */
	public function test_str_to_pascal_case(): void {
		$string = "welcome~ to *pascal case!!";
		$expected_result = "WelcomeToPascalCase";

		//this method uses another method (str_to_words) from same file
		$result = \Cig\str_to_pascal_case($string);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
	}

	//TODO: expected this to break but this method goes ahead and turns
	// numbers into strings despite typescript asking for a string
	public function test_number_to_pascal_case(): void {
		$not_a_string = 1011;
		// $expected_result = "don't expect result";

		// TODO: showing test with string result to document. correct or refactor?
		$method_result = '1011';

		$result = \Cig\str_to_pascal_case($not_a_string);

		self::assertIsString($result);
		self::assertSame($method_result, $result);
	}
}
