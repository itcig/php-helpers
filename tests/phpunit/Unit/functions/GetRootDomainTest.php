<?php


namespace Cig\Tests\Unit\Functions;

class GetRootDomainTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\get_root_domain()
	 */
	public function test_get_root_domain(): void {

		$url_string = 'https://training.businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
		$expected_result = 'businessmanagementdaily.com';

		$result = \Cig\get_root_domain($url_string);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
	}

	/**
	 * @covers ::\Cig\get_root_domain()
	 */
	public function test_get_root_domain_if_null(): void {

//		$result = \Cig\get_root_domain();

		self::markTestSkipped('**WIP** Revisit');
	}
}