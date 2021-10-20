<?php

namespace Cig\Tests\Unit\Functions;

class StrToHumanReadableTest extends \Cig\Tests\Unit\BaseTestCase {

	public function provide_str_case_data(): array {
		return [
			'camelCase' => [
				// string
				'camelCaseStringTest',
				//  expected result
				'camel Case String Test'
			],
			// note: not technically a 'fail' but incorrectly separates surnames with bicapital
			'bicapital' => [
				// string
				'danny-DeVito_',
				//  expected result
				'danny De Vito'
			],
			'pascal' => [
				// string
				'PascalCaseIsTheCase',
				//  expected result
				'Pascal Case Is The Case'
			],
			'snake' => [
				// string
				'itsa_me_snake_case',
				//  expected result
				'itsa me snake case'
			],
			'kebab' => [
				// string
				'kebab-case-pepper-tomato',
				//  expected result
				'kebab case pepper tomato'
			],
			//TODO: another instance of integers turning into strings: expected or should this fail?
			'integer' => [
				// int
				42,
				//  expected result
				'42'
			],
		];
	}

	/**
	 * @dataProvider provide_str_case_data
	 * @param $string
	 * @param $expected_result
	 */
	public function test_str_to_human_readable_camel($string, $expected_result): void {
		$result = \Cig\str_to_human_readable($string);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
	}

	public function test_str_to_human_readable_with_array(): void {
		$array = ['spooky', 'scary', 'skeletons'];
		// $expected_result = ;

		$this->expectError();
		$this->expectErrorMessage('Argument 1 passed to Cig\str_to_human_readable() must be of the type string, array given');

		$result = \Cig\str_to_human_readable($array);
	}
}
