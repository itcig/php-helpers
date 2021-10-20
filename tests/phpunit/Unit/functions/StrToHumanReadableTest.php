<?php

namespace Cig\Tests\Unit;

use PHPUnit\Framework\Error\Notice;
use PHPUnit\Framework\Error\Warning;

class StrToHumanReadableTest extends \Cig\Tests\Unit\BaseTestCase {

	//TODO: look into method re:what defines human readable, caps/all lowercase/etc
	public function test_str_to_human_readable_camel(): void {
		$string = 'camelCaseStringTest!!';
		$expected_result = 'camel Case String Test';

		$result = \Cig\str_to_human_readable($string);

		self::assertSame($expected_result, $result);
	}

	public function test_str_to_human_readable_bicapital(): void {
		$string = 'danny-DeVito_';
		$expected_result = 'danny De Vito';

		$result = \Cig\str_to_human_readable($string);

		// note: not technically a 'fail' but incorrectly separates surnames with bicapital
		self::assertSame($expected_result, $result);
	}

	public function test_str_to_human_readable_with_array(): void {
		$array = ['spooky', 'scary', 'skeletons'];
		// $expected_result = ;

		$this->expectError();
		$this->expectErrorMessage('Argument 1 passed to Cig\str_to_human_readable() must be of the type string, array given');

		$result = \Cig\str_to_human_readable($array);
	}

	public function test_str_to_human_readable_pascal(): void {
		$string = 'PascalCaseIsTheCase';
		$expected_result = 'Pascal Case Is The Case';

		$result = \Cig\str_to_human_readable($string);

		self::assertSame($expected_result, $result);
	}

	public function test_str_to_human_readable_snake(): void {
		$string = "itsa_me_snake_case";
		$expected_result = "itsa me snake case";

		$result = \Cig\str_to_human_readable($string);

		self::assertSame($expected_result, $result);
	}
}
