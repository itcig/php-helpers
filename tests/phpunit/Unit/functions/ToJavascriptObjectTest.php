<?php

namespace Cig\Tests\Unit\Functions;

class ToJavascriptObjectTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\to_javascript_object()
	 */
	public function test_to_javascript_object(): void {

		$array = ['the shining', 'nightmare on elm street', 'evil dead'];
		$expected_result = ["the shining", "nightmare on elm street", "evil dead"];

		$result = \Cig\to_javascript_object($array);

		self::assertIsString($result);
//		self::assertSame($expected_result, $result);
	}

	/**
	 * @covers ::\Cig\to_javascript_object()
	 */
	public function test_to_javascript_object_array_with_children(): void {

		$array = ['movies' => ['the shining', 'nightmare on elm street', 'evil dead'], 'objects' => ['lamp', 'water', 'phone']];
		$expected_result = '{movies: ["the shining", "nightmare on elm street", "evil dead"], objects: ["lamp", "water", "phone"]}';

		$result = \Cig\to_javascript_object($array);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
	}
}
