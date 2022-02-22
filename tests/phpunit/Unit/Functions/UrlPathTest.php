<?php
/**
 * URL path tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\url_path;

/**
 * Class UrlPathTest
 */
class UrlPathTest extends BaseTestCase {
    /**
     * Test URL path with passed URL
     *
     * @covers ::url_path()
     */
    public function test_url_path(): void {

        $url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/image.html';
        $expected_result = '/8564/training-pass-save-train-win-big/image.html';

        $result = url_path($url);

        self::assertIsString($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test URL path for URL with no path
     *
     * @covers ::url_path()
     */
    public function test_url_no_path(): void {

        $url = 'https://businessmanagementdaily.com';
        $expected_result = null;

        $result = url_path($url);

        self::assertNull($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test URL path for just a trailing-slash
     *
     * @covers ::url_path()
     */
    public function test_url_path_trailing_slash(): void {

        $url = 'https://businessmanagementdaily.com/';
        $expected_result = '/';

        $result = url_path($url);

        self::assertIsString($result);
        self::assertSame($expected_result, $result);
    }
}
