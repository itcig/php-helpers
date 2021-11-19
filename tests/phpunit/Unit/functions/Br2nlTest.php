<?php

namespace Cig\Tests\Unit\Functions;

class Br2nlTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\br2nl()
	 */
	public function test_br2nl(): void {
		$string = 'here is a <br />line break';
		$expected_result = 'here is a 
line break';

		$result = \Cig\br2nl($string);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
	}

	/**
	 * test <br/> with no space
	 * @covers ::\Cig\br2nl()
	 */
	public function test_br_no_space(): void {
		$string = "here is a <br/>line break";
//		$expected_result = 'here is a
//line break';

		$result = \Cig\br2nl($string);

		self::markTestSkipped('**WIP** Revisit this test - does not consider br without space');
	}

	/**
	 * test <br > with no whack
	 * @covers ::\Cig\br2nl()
	 */
	public function test_br_no_whack(): void {
		$string = "here is a <br >line break";
		//		$expected_result = 'here is a
//line break';

		$result = \Cig\br2nl($string);

		self::markTestSkipped('**WIP** Revisit this test — does not consider br without whack');
	}

	/**
	 * test <br> with no space or whack
	 * @covers ::\Cig\br2nl()
	 */
	public function test_br_no_space_no_whack(): void {
		$string = "here is a <br>line break";
		//		$expected_result = 'here is a
//line break';

		$result = \Cig\br2nl($string);

		self::markTestSkipped('**WIP** Revisit this test - does not consider br without space');
	}
}
