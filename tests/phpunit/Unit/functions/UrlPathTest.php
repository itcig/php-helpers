<?php


namespace Cig\Tests\Unit\Functions;

class UrlPathTest extends \Cig\Tests\Unit\BaseTestCase {

	/**
	 * @covers ::\Cig\url_path()
	 */
	public function test_url_path(): void {

		$url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/image.html';
		$expected_result = '/8564/training-pass-save-train-win-big/image.html';

		$result = \Cig\url_path($url);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
	}

	/**
	 * @covers ::\Cig\url_path()
	 */
	public function test_url_no_path(): void {

		$url = 'https://businessmanagementdaily.com';
		$expected_result = null;

		$result = \Cig\url_path($url);

		self::assertNull($result);
		self::assertSame($expected_result, $result);
	}

	/**
	 * @covers ::\Cig\url_path()
	 */
	public function test_url_path_trailing_slash(): void {

		$url = 'https://businessmanagementdaily.com/';
		$expected_result = '/';

		$result = \Cig\url_path($url);

		self::assertIsString($result);
		self::assertSame($expected_result, $result);
	}
}