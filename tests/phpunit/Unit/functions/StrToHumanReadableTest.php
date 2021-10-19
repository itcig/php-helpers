<?php

namespace Cig\Tests\Unit;

use PHPUnit\Framework\Error\Notice;
use PHPUnit\Framework\Error\Warning;

class StrToHumanReadableTest extends \Cig\Tests\Unit\BaseTestCase {
	//TODO: look into method re:what defines human readable, caps/all lowercase/etc
	public function test_str_to_human_readable_camel(): void {
		$string = "camelCaseStringTest!!";
		$expected_result = "camel Case String Test";

		$result = \Cig\str_to_human_readable($string);

		self::assertSame($expected_result, $result);
	}
}
