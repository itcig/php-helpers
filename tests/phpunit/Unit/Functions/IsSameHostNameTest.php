<?php
/**
 * Same hostname tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\is_same_hostname;

/**
 * Class IsSameHostNameTest
 */
class IsSameHostNameTest extends BaseTestCase {
    /**
     * Test if same hostname with two passed URLs
     *
     * @covers ::is_same_hostname()
     */
    public function test_is_same_hostname(): void {

        $url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
        $url2 = 'https://businessmanagementdaily.com/8680/small-bus-tax-deduction/';

        $result = is_same_hostname($url, $url2);

        self::assertIsBool($result);
        self::assertTrue($result);
    }

    /**
     * Test if same hostname with two passed URLs and one has a subdomain
     *
     * @covers ::is_same_hostname()
     */
    public function test_is_not_same_hostname(): void {

        $url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
        $url2 = 'https://training.businessmanagementdaily.com/8680/small-bus-tax-deduction/';

        $result = is_same_hostname($url, $url2);

        self::assertIsBool($result);
        self::assertFalse($result);
    }

    /**
     * Test if same hostname with a passed URL + current URL
     *
     * @covers ::is_same_hostname()
     */
    public function test_is_same_hostname_no_comparison(): void {

        $url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';

        $result = is_same_hostname($url);

        self::assertIsBool($result);
        self::assertFalse($result);
    }
}
