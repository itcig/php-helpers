<?php
/**
 * URL modify querystring tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions\Url;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\url_modify_querystring;

/**
 * Class UrlQuerystringAppendTest
 */
class UrlModifyQuerystringTest extends BaseTestCase {
    /**
     * Test adding a new querystring to a URL
     *
     * @covers ::url_modify_querystring()
     */
    public function test_url_append_new_qs(): void {

        $data = [
          'foo' => "bar",
        ];

        $url = 'https://example.com/path';
        $expected_result = $url . "?foo=bar";

        $result = url_modify_querystring($data, $url);

        self::assertIsString($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test appending data to an existing querystring
     *
     * @covers ::url_modify_querystring()
     */
    public function test_url_append_existing_qs(): void {

        $data = [
            'new' => "value",
        ];

        $url = 'https://example.com/path?foo=bar';
        $expected_result = $url . "&new=value";

        $result = url_modify_querystring($data, $url);

        self::assertIsString($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test overwriting data on an existing querystring
     *
     * @covers ::url_modify_querystring()
     */
    public function test_url_overwrite_qs(): void {

        $data = [
            'foo' => "baz",
        ];

        $base_url = "https://example.com/path";

        $url = $base_url . "?foo=bar&var=test";
        $expected_result = $base_url . "?foo=baz&var=test";

        $result = url_modify_querystring($data, $url);

        self::assertIsString($result);
        self::assertSame($expected_result, $result);
    }
}
