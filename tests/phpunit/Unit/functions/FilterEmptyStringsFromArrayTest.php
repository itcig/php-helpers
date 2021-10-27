<?php

namespace Cig\Tests\Unit\Functions;

class FilterEmptyStringsFromArrayTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\filter_empty_strings_from_array
	 *
	 * @param $array
	 * @param $expected_result
	 */
	public function test_filter_empty_strings_from_non_assoc_array(): void {
		$array = ['dracula', '', 'werewolf'];
		$expected_result = [0 => 'dracula', 2 => 'werewolf'];

		$result = \Cig\filter_empty_strings_from_array($array);

		self::assertIsArray($result);
		self::assertSame($expected_result, $result);
	}

	/**
	 * @covers ::\Cig\filter_empty_strings_from_array
	 *
	 * @param $string
	 * @param $expected_result
	 */
	public function test_filter_empty_strings_from_assoc_array(): void {
		$array = ['werewolf' => 'full moon', '', 'mummy' => '', 'dracula' => 'castle'];
		$expected_result = ['werewolf' => 'full moon', 'dracula' => 'castle'];

		$result = \Cig\filter_empty_strings_from_array($array);

		var_dump($result);

		self::assertIsArray($result);
		self::assertSame($expected_result, $result);
	}
}
