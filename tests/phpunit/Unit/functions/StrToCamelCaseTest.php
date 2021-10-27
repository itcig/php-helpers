<?php

namespace Cig\Tests\Unit;

//TODO: add data provider for all these redundant string tests (in setup?)


class StrToCamelCaseTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\str_to_camel_case()
	 */
	public function test_str_to_camel_case(): void {
		$string = "welcome~ to camel' case!!";
		$expected_result = "welcomeToCamelCase";
//		$string = "D'Angelo";
//		$expected_result = "dAngelo";

		//this method uses another method (str_to_words) from same file (string.php)
		$result = \Cig\str_to_camel_case($string);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
		// skipping international alphabet tests
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
