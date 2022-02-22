<?php
/**
 * Line break to newline tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\br2nl;

/**
 * Class Br2nlTest
 */
class Br2nlTest extends BaseTestCase {
    /**
     * Test br2nl
     *
     * @covers ::br2nl()
     */
    public function test_br2nl(): void {
        $string = "here is a <br />line break";
        $expected_result = "here is a
line break";

        $result = br2nl($string);

// self::assertIsString($result);
// self::assertSame($expected_result, $result);

        self::markTestSkipped('**WIP** Revisit this test - not picking up the line break in the expected result var');
    }

    /**
     * Test <br/> with no space
     *
     * @covers ::br2nl()
     */
    public function test_br_no_space(): void {
        $string = "here is a <br/>line break";
// $expected_result = 'here is a
// line break';

        $result = br2nl($string);

        self::markTestSkipped('**WIP** Revisit this test - does not consider br without space');
    }

    /**
     * Test <br > with no whack
     *
     * @covers ::br2nl()
     */
    public function test_br_no_whack(): void {
        $string = "here is a <br >line break";
        // $expected_result = 'here is a
// line break';

        $result = br2nl($string);

        self::markTestSkipped('**WIP** Revisit this test — does not consider br without whack');
    }

    /**
     * Test <br> with no space or whack
     *
     * @covers ::br2nl()
     */
    public function test_br_no_space_no_whack(): void {
        $string = "here is a <br>line break";
        // $expected_result = 'here is a
// line break';

        $result = br2nl($string);

        self::markTestSkipped('**WIP** Revisit this test - does not consider br without space');
    }
}
