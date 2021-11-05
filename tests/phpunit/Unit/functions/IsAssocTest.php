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
}