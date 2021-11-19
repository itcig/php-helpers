<?php


namespace Cig\Tests\Unit\Functions;

class JsonParseNumericTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\json_parse_numeric()
	 */
	public function test_json_parse_numeric(): void {

		$string = '123456789';

		$result = \Cig\json_parse_numeric($string);

		self::assertIsInt($result);
	}

	/**
	 * @covers ::\Cig\json_parse_numeric()
	 */
	public function test_json_parse_numeric_zero_start(): void {

		$string = '0123456789';

		$result = \Cig\json_parse_numeric($string);

		self::assertIsString($result);
	}

	/**
	 * @covers ::\Cig\json_parse_numeric()
	 */
	public function test_json_parse_numeric_plus_start(): void {

		$string = '+123456789';

		$result = \Cig\json_parse_numeric($string);

		self::assertIsString($result);
	}
}