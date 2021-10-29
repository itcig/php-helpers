<?php

namespace Cig\Tests\Unit\Functions;

class FilterEmptyStringsFromArrayTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @return array[]
	 */
	public function provide_empty_string_array_data(): array {
		return [
			'non_assoc' => [
				//array
				['dracula', '', 'werewolf'],
				//expected result
				[0 => 'dracula', 2 => 'werewolf'],
			],
//			'assoc' => [
//				//array
//
//				//expected result
//			],
//			'mixed_array' => [
//				//array
//
//				//expected result
//			],
		];
	}

	/**
	 * @covers ::\Cig\filter_empty_strings_from_array
	 *
	 * @dataProvider provide_empty_string_array_data
	 * @param $array
	 * @param $expected_result
	 */
	public function test_filter_empty_strings_from_non_assoc_array($array, $expected_result): void {
//		$array = ['dracula', '', 'werewolf'];
//		$expected_result = [0 => 'dracula', 2 => 'werewolf'];

		$result = \Cig\filter_empty_strings_from_array($array);

		self::assertIsArray($result);
		self::assertSame($expected_result, $result);
	}

	/**
	 * @covers ::\Cig\filter_empty_strings_from_array
	 *
	 * @param $array
	 * @param $expected_result
	 */
	public function test_filter_empty_strings_from_assoc_array(): void {
		$array = ['werewolf' => 'full moon', '', 'mummy' => '', 'dracula' => 'castle'];
		$expected_result = ['werewolf' => 'full moon', 'dracula' => 'castle'];

		$result = \Cig\filter_empty_strings_from_array($array);

		self::assertIsArray($result);
		self::assertSame($expected_result, $result);
	}

	/**
	 * @covers ::\Cig\filter_empty_strings_from_array
	 *
	 * @param $array
	 * @param $expected_result
	 */
	public function test_filter_empty_strings_from_mixed_array(): void {
		$array = [0 => 'full moon', 1 => '', 'mummy' => '', 'dracula' => 'castle'];
		$expected_result = [0 => 'full moon', 'dracula' => 'castle'];

		$result = \Cig\filter_empty_strings_from_array($array);

		self::assertIsArray($result);
		self::assertSame($expected_result, $result);
	}
}
