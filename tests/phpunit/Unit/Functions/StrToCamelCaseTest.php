<?php
/**
 * String to Camel-case tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\str_to_camel_case;

/**
 * Class StrToCamelCaseTest
 */
class StrToCamelCaseTest extends BaseTestCase {
    /**
     * Test string to camel-case
     *
     * @covers ::str_to_camel_case()
     */
    public function test_str_to_camel_case(): void {
        $string = "welcome~ to camel' case!!";
        $expected_result = "welcomeToCamelCase";
        // TODO: order of operations error with stubbing a function (str_to_words) in the same file as str_to_camel_case()
        // Functions\stubs(['str_to_words' => ['welcome', 'to', 'camel', 'case']]);

        // this method uses another method (str_to_words) from same file (string.php)
        $result = str_to_camel_case($string);

        self::assertIsString($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test camel-case with international alphabets
     *
     * SKIP: international alphabets
     */
    public function test_str_to_camel_case_international_alphabets(): void {
        $int_string = 'Добро пожаловать в верблюжачью';
        $expected_result = "ДоброПожаловатьВВерблюжачью";

        // current method took one int alphabet test and only removed spaces
        // $result = str_to_camel_case();

        self::markTestSkipped('**WIP** Revisit this test');
    }
}
