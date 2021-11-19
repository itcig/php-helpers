<?php


namespace Cig\Tests\Unit\Functions;

class IsSameRootDomainTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\is_same_root_domain()
	 */
	public function test_is_same_root_domain(): void {

		$url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
		$url2 = 'https://businessmanagementdaily.com/8680/small-bus-tax-deduction/';

		$result = \Cig\is_same_root_domain($url, $url2);

		self::assertIsBool($result);
		self::assertTrue($result);
	}

	/**
	 * @covers ::\Cig\is_same_root_domain()
	 */
	public function test_is_same_root_domain_subdomain(): void {

		$url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
		$url2 = 'https://training.businessmanagementdaily.com/8680/small-bus-tax-deduction/';

		$result = \Cig\is_same_root_domain($url, $url2);

		self::assertIsBool($result);
		self::assertTrue($result);
	}

	/**
	 * @covers ::\Cig\is_same_root_domain()
	 */
	public function test_is_not_same_root_domain(): void {

		$url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
		$url2 = 'https://training.investingdaily.com/8680/small-bus-tax-deduction/';

		$result = \Cig\is_same_root_domain($url, $url2);

		self::assertIsBool($result);
		self::assertFalse($result);
	}

	/**
	 * @covers ::\Cig\is_same_root_domain()
	 */
	public function test_is_same_root_domain_no_comparison(): void {

		$url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';

		$result = \Cig\is_same_root_domain($url);

		self::assertIsBool($result);
		self::assertFalse($result);
	}
}