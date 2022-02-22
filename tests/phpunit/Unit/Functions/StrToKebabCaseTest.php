<?php
/**
 * String to Kebab-case tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\str_to_kebab_case;

/**
 * Class StrToKebabCaseTest
 */
class StrToKebabCaseTest extends BaseTestCase {
    /**
     * Test string to kebab-case
     *
     * @covers ::str_to_kebab_case()
     */
    public function test_str_to_kebab_case(): void {
        $string = 'welcome~ to *kebab case!!';
        $expected_result = 'welcome-to-kebab-case';

        // TODO: order of operations error with stubbing a function (str_to_words) in the same file as str_to_kebab_case()
        // Functions\stubs(['str_to_words' => ['welcome', 'to', 'kebab', 'case']]);

        $result = str_to_kebab_case($string);

        self::assertIsString($result);
        self::assertSame($expected_result, $result);
    }
}
