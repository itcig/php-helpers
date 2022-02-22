<?php
/**
 * Parse JSON numeric tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\json_parse_numeric;

/**
 * Class JsonParseNumericTest
 */
class JsonParseNumericTest extends BaseTestCase {
    /**
     * Test JSON parse numeric with a single value
     *
     * @covers ::json_parse_numeric()
     */
    public function test_json_parse_numeric(): void {

        $string = '123456789';

        $result = json_parse_numeric($string);

        self::assertIsInt($result);
    }

    /**
     * Test JSON parse numeric with a single value beginning with '0'
     *
     * @covers ::json_parse_numeric()
     */
    public function test_json_parse_numeric_zero_start(): void {

        $string = '0123456789';

        $result = json_parse_numeric($string);

        self::assertIsString($result);
    }

    /**
     * Test JSON parse numeric with a string beginning with '+'
     *
     * @covers ::json_parse_numeric()
     */
    public function test_json_parse_numeric_plus_start(): void {

        $string = '+123456789';

        $result = json_parse_numeric($string);

        self::assertIsString($result);
    }
}
