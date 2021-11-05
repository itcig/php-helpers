<?php

namespace Cig\Tests\Unit\Functions;

class IsAssocTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\is_assoc()
	 */
	public function test_is_assoc(): void {
		$array = ['scotland' => 'loch ness', 'greece' => 'hydra', 'mexico' => 'quetzalcoatl'];
		$expected_result = TRUE;

		$result = \Cig\is_assoc($array);

		self::assertIsBool($result);
		self::assertSame($expected_result, $result);
	}


	/**
	 * @covers ::\Cig\is_assoc()
	 */
	public function test_is_assoc_non_assoc(): void {
		$array = ['loch ness', 'hydra', 'quetzalcoatl'];
		$expected_result = FALSE;

		$result = \Cig\is_assoc($array);

		self::assertIsBool($result);
		self::assertSame($expected_result, $result);
	}

	/**
	 * TODO: shouldn't this fail?
	 * @covers ::\Cig\is_assoc()
	 */
	public function test_is_assoc_mixed(): void {
		$array = ['scotland' => 'loch ness', 1 => 'hydra', 2 => 'quetzalcoatl'];
		$expected_result = TRUE; // ??

		$result = \Cig\is_assoc($array);

		self::markTestSkipped('**WIP** Revisit this test');

		//	self::assertIsBool($result);
		//	self::assertSame($expected_result, $result);
	}
}