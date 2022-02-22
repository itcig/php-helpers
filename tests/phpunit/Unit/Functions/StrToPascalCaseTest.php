<?php
/**
 * String to Pascal-case tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\str_to_pascal_case;

/**
 * Class StrToPascalCaseTest
 */
class StrToPascalCaseTest extends BaseTestCase {
    /**
     * Test string to Pascal-case
     *
     * @covers ::str_to_pascal_case()
     */
    public function test_str_to_pascal_case(): void {
        $string = "welcome~ to *pascal case!!";
        $expected_result = "WelcomeToPascalCase";
// TODO: order of operations error with stubbing a function (str_to_words) in the same file as str_to_pascal_case()
// Functions\stubs(['str_to_words' => ['welcome', 'to', 'pascal', 'case']]);

        // this method uses another method (str_to_words) from same file
        $result = str_to_pascal_case($string);

        self::assertIsString($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test number to Pascal-case
     *
     * TODO: expected this to break but this method goes ahead and turns
     */
    public function test_number_to_pascal_case(): void {
        $not_a_string = 1011;
        // $expected_result = "don't expect result";

        // TODO: showing test with string result to document. correct or refactor?
        $method_result = '1011';

        $result = str_to_pascal_case($not_a_string);

        self::assertIsString($result);
        self::assertSame($method_result, $result);
    }
}
