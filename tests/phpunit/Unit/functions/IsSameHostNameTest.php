<?php


namespace Cig\Tests\Unit\Functions;

class IsSameHostNameTest extends \Cig\Tests\Unit\BaseTestCase {

//	TODO: could use a dataProvider

	/**
	 * @covers ::\Cig\is_same_hostname()
	 */
	public function test_is_same_hostname(): void {

		$url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
		$url2 = 'https://businessmanagementdaily.com/8680/small-bus-tax-deduction/';

		$result = \Cig\is_same_hostname($url, $url2);

		self::assertIsBool($result);
		self::assertTrue($result);
	}

	/**
	 * @covers ::\Cig\is_same_hostname()
	 */
	public function test_is_not_same_hostname(): void {

		$url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
		$url2 = 'https://training.businessmanagementdaily.com/8680/small-bus-tax-deduction/';

		$result = \Cig\is_same_hostname($url, $url2);

		self::assertIsBool($result);
		self::assertFalse($result);
	}

	/**
	 * @covers ::\Cig\is_same_hostname()
	 */
	public function test_is_same_hostname_no_comparison(): void {

		$url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';

		$result = \Cig\is_same_hostname($url);

		self::assertIsBool($result);
		self::assertFalse($result);
	}
}