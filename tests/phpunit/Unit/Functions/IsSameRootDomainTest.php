<?php
/**
 * Same root domain tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\is_same_root_domain;

/**
 * Class IsSameRootDomainTest
 */
class IsSameRootDomainTest extends BaseTestCase {
    /**
     * Test root domain is the same by passing in two URLs
     *
     * @covers ::is_same_root_domain()
     */
    public function test_is_same_root_domain(): void {

        $url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
        $url2 = 'https://businessmanagementdaily.com/8680/small-bus-tax-deduction/';

        $result = is_same_root_domain($url, $url2);

        self::assertIsBool($result);
        self::assertTrue($result);
    }

    /**
     * Test root domain is the same by passing in two URLs and one has a subdomain
     *
     * @covers ::is_same_root_domain()
     */
    public function test_is_same_root_domain_subdomain(): void {

        $url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
        $url2 = 'https://training.businessmanagementdaily.com/8680/small-bus-tax-deduction/';

        $result = is_same_root_domain($url, $url2);

        self::assertIsBool($result);
        self::assertTrue($result);
    }

    /**
     * Test root domain is NOT the same by passing in two URLs
     *
     * @covers ::is_same_root_domain()
     */
    public function test_is_not_same_root_domain(): void {

        $url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
        $url2 = 'https://training.investingdaily.com/8680/small-bus-tax-deduction/';

        $result = is_same_root_domain($url, $url2);

        self::assertIsBool($result);
        self::assertFalse($result);
    }

    /**
     * Test root domain is the same with passed URL + current URL
     *
     * @covers ::is_same_root_domain()
     */
    public function test_is_same_root_domain_no_comparison(): void {

        $url = 'https://businessmanagementdaily.com/8564/training-pass-save-train-win-big/';

        $result = is_same_root_domain($url);

        self::assertIsBool($result);
        self::assertFalse($result);
    }
}
