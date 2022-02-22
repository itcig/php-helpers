<?php
/**
 * Get root domain tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\get_root_domain;

/**
 * Class GetRootDomainTest
 */
class GetRootDomainTest extends BaseTestCase {
    /**
     * Test get root domain without subdomain
     *
     * @covers ::get_root_domain()
     */
    public function test_get_root_domain(): void {

        $url_string = 'https://training.businessmanagementdaily.com/8564/training-pass-save-train-win-big/';
        $expected_result = 'businessmanagementdaily.com';

        $result = get_root_domain($url_string);

        self::assertIsString($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test root domain with null
     *
     * @covers ::get_root_domain()
     */
    public function test_get_root_domain_if_null(): void {

// $result = get_root_domain();

        self::markTestSkipped('**WIP** Revisit');
    }
}
