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
			'assoc' => [
				//array
				['werewolf' => 'full moon', '', 'mummy' => '', 'dracula' => 'castle'],
				//expected result
				['werewolf' => 'full moon', 'dracula' => 'castle'],
			],
			'mixed_array' => [
				//array
				[0 => 'full moon', 1 => '', 'mummy' => '', 'dracula' => 'castle'],
				//expected result
				[0 => 'full moon', 'dracula' => 'castle'],
			],
		];
	}

	/**
	 * @covers ::\Cig\filter_empty_strings_from_array
	 *
	 * @dataProvider provide_empty_string_array_data
	 *
	 * @param $array
	 * @param $expected_result
	 */
	public function test_filter_empty_strings_from_array($array, $expected_result): void {
		$result = \Cig\filter_empty_strings_from_array($array);

		self::assertIsArray($result);
		self::assertSame($expected_result, $result);
	}

	public function test_filter_empty_strings_from_string(): void {
		$array = 'what we do in the shadows';
		// $expected_result = 'don't expect a result';

		$this->expectError();
		$this->expectErrorMessage('Argument #1 ($arr) must be of type array, string given');

		$result = \Cig\filter_empty_strings_from_array($array);
	}
}
