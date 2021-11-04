<?php

namespace Cig\Tests\Unit\Functions;

//TODO: string helpers are really stepping on each other in string.php

class Br2nlTest extends \Cig\Tests\Unit\BaseTestCase {

	public function test_br2nl(): void {
		$string = 'here is a <br />line break';
		$expected_result = 'here is a 
line break';

		$result = \Cig\br2nl($string);

		self::assertSame($expected_result, $result);

		self::assertTrue(TRUE);
	}

	public function test_br_no_whack(): void {
		$string = "here is a <br>line break";
//		$expected_result = 'here is a
//line break';

		$result = \Cig\br2nl($string);

		self::markTestSkipped('**WIP** Revisit this test — does not consider br without whack');
	}

	public function test_br_no_space(): void {
		$string = "here is a <br>line break";
//		$expected_result = 'here is a
//line break';

		$result = \Cig\br2nl($string);

		self::markTestSkipped('**WIP** Revisit this test - does not consider br without space');
	}
}
