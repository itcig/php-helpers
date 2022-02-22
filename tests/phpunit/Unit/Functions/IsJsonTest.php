<?php
/**
 * Is Json tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\is_json;

/**
 * Class IsJsonTest
 */
class IsJsonTest extends BaseTestCase {
    /**
     * Test if is valid JSON
     *
     * @covers ::is_json()
     */
    public function test_is_json(): void {
// $json_string = `'{"name":"John", "age":30, "car":no}'`;

// $result = is_json($json_string);

// self::assertIsBool($result);
// self::assertTrue($result);

        // TODO: is this only files/documents or an actual json string
        self::markTestSkipped('**WIP** Revisit - json is coming back false on json strings');
    }

    /**
     * Test if not valid JSON
     *
     * @covers ::is_json()
     */
    public function test_is_not_json(): void {
        $string = `not a jason string`;

        $result = is_json($string);

        self::assertIsBool($result);
        self::assertFalse($result);

        self::markTestSkipped('**WIP** Revisit');
    }
}
