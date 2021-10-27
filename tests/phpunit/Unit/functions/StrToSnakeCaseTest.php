<?php

namespace Cig\Tests\Unit;


class StrToSnakeCaseTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\str_to_snake_case()
	 */
	public function test_str_to_snake_case(): void {
		$string = "welcome~ to *snake case!!";
		$expected_result = "welcome_to_snake_case";

		//this method uses another method (str_to_words) from same file
		$result = \Cig\str_to_snake_case($string);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
	}
}
