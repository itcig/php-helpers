<?php

namespace Cig\Tests\Unit\Functions;

use Brain\Monkey\Functions;


class StrToSnakeCaseTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\str_to_snake_case()
	 */
	public function test_str_to_snake_case(): void {
		$string = "welcome~ to *snake case!!";
		$expected_result = "welcome_to_snake_case";

		//		TODO: order of operations error with stubbing a function (str_to_words) in the same file as str_to_snake_case()
		//		Functions\stubs(['\CIG\str_to_words' => ['welcome', 'to', 'snake', 'case']]);

		$result = \Cig\str_to_snake_case($string);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
	}
}
