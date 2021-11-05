<?php

// NOTE: I don't know why this is necessary to honor typing for
// test_number_to_camel_case(), but it won't fail properly without it.
declare(strict_types=1);

namespace Cig\Tests\Unit\Functions;

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

	public function test_number_to_camel_case(): void {
		$not_a_string = 101;
		// $expected_result = don't expect a result;

		$this->expectError();
		$this->expectErrorMessage('Argument #1 ($string) must be of type string, int given');

		$result = \Cig\str_to_camel_case($not_a_string);
	}
}
