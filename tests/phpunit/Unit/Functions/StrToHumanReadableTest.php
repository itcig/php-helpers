<?php
/**
 * String to Human-readable casing tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\str_to_human_readable;

/**
 * Class StrToHumanReadableTest
 */
class StrToHumanReadableTest extends BaseTestCase {
    /***
     * Sample data for tests
     *
     * @return array Strings, expected results
     */
    public function provide_str_case_data(): array {
        return [
                'camelCase' => [
                    // string
                        'camelCaseStringTest',
                    // expected result
                        'camel Case String Test'
                ],
            // note: not technically a 'fail' but incorrectly separates surnames with bicapital
            // TODO: add option to pass in lowercase var for str_to_words?
                'bicapital' => [
                    // string
                        'danny-DeVito_',
                    // expected result
                        'danny De Vito'
                ],
                'pascal' => [
                    // string
                        'PascalCaseIsTheCase',
                    // expected result
                        'Pascal Case Is The Case'
                ],
                'snake' => [
                    // string
                        'itsa_me_snake_case',
                    // expected result
                        'itsa me snake case'
                ],
                'kebab' => [
                    // string
                        'kebab-case-pepper-tomato',
                    // expected result
                        'kebab case pepper tomato'
                ],
            // TODO: another instance of integers turning into strings: expected or should this fail?
                'integer' => [
                    // int
                        42,
                    // expected result
                        '42'
                ],
        ];
    }

    /**
     * Test string to human-readable
     *
     * @covers ::str_to_human_readable
     *
     * @dataProvider provide_str_case_data
     *
     * @param any $string The string to convert.
     * @param any $expected_result The expected human-readable string.
     */
    public function test_str_to_human_readable($string, $expected_result): void {
        // TODO: order of operations error with stubbing a function (str_to_words) in the same file as str_to_human_readable()
        // Functions\stubs(['str_to_words' => [/*$stubkey would be in dataprovider*/]]);

        $result = str_to_human_readable($string);

        self::assertIsString($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test string to human-readable with accents
     *
     * SKIP: replacing accents to names
     */
    public function test_str_to_human_readable_accents(): void {
        $string = "dAngelo";
        $expected_result = "d'angelo";

        self::markTestSkipped('**WIP** Revisit this test');
    }

    /**
     * Test string to human-readable with bicapital letters
     *
     * SKIP: bringing bicapital surnames together
     */
    public function test_str_to_human_readable_no_space_bicapital(): void {
        $string = 'DannyDeVito';
        $expected_result = 'Danny DeVito';

        self::markTestSkipped('**WIP** Revisit this test');
    }
}
