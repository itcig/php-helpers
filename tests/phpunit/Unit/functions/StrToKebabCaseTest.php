<?php
declare(strict_types=1);

namespace Cig\Tests\Unit\Functions;


class StrToKebabCaseTest extends \Cig\Tests\Unit\BaseTestCase {

//	TODO: stub str_to_words

	/**
	 * @covers ::\Cig\str_to_kebab_case()
	 */
	public function test_str_to_kebab_case(): void {
		$string = "welcome~ to *kebab case!!";
		$expected_result = "welcome-to-kebab-case";

		//this method uses another method (str_to_words) from same file
		$result = \Cig\str_to_kebab_case($string);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
	}

	public function test_number_to_kebab_case(): void {
		$not_a_string = 1011;
		// $expected_result = "don't expect result";

		// TODO: showing test with string result to document. correct or refactor?
		$method_result = '1011';

		self::expectError();
		self::expectErrorMessage('Argument 1 passed to Cig\str_to_kebab_case() must be of the type string, int given');

		$result = \Cig\str_to_kebab_case($not_a_string);
	}
}
