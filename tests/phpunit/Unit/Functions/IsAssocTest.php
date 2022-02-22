<?php
/**
 * Is associated array tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\is_assoc;

/**
 * Class IsAssocTest
 */
class IsAssocTest extends BaseTestCase {
    /**
     * Test if array is associated with valid array
     *
     * @covers ::is_assoc()
     */
    public function test_is_assoc(): void {
        $array = ['scotland' => 'loch ness', 'greece' => 'hydra', 'mexico' => 'quetzalcoatl'];
        $expected_result = true;

        $result = is_assoc($array);

        self::assertIsBool($result);
        self::assertSame($expected_result, $result);
    }


    /**
     * Test if array is associated with a numerically indexed array
     *
     * @covers ::is_assoc()
     */
    public function test_is_assoc_non_assoc(): void {
        $array = ['loch ness', 'hydra', 'quetzalcoatl'];
        $expected_result = false;

        $result = is_assoc($array);

        self::assertIsBool($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test if array is associated with an array of mixed string and numeric indexes     *
     * TODO: shouldn't this fail?
     *
     * @covers ::is_assoc()
     */
    public function test_is_assoc_mixed(): void {
        $array = ['scotland' => 'loch ness', 1 => 'hydra', 2 => 'quetzalcoatl'];
        $expected_result = true; // ??

        $result = is_assoc($array);

        self::markTestSkipped('**WIP** Revisit this test');

        // self::assertIsBool($result);
        // self::assertSame($expected_result, $result);
    }
}
