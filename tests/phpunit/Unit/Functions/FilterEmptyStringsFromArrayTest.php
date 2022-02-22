<?php
/**
 * Filter empty strings from arrays tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\filter_empty_strings_from_array;

/**
 * Class FilterEmptyStringsFromArrayTest
 */
class FilterEmptyStringsFromArrayTest extends BaseTestCase {
    /**
     * Create sample arrays
     *
     * @return array[]
     */
    public function provide_empty_string_array_data(): array {
        return [
                'non_assoc' => [
                    // array
                        ['dracula', '', 'werewolf'],
                    // expected result
                        [0 => 'dracula', 2 => 'werewolf'],
                ],
                'assoc' => [
                    // array
                        ['werewolf' => 'full moon', '', 'mummy' => '', 'dracula' => 'castle'],
                    // expected result
                        ['werewolf' => 'full moon', 'dracula' => 'castle'],
                ],
                'mixed_array' => [
                    // array
                        [0 => 'full moon', 1 => '', 'mummy' => '', 'dracula' => 'castle'],
                    // expected result
                        [0 => 'full moon', 'dracula' => 'castle'],
                ],
        ];
    }

    /**
     * Test filtering empty strings from array
     *
     * @covers ::filter_empty_strings_from_array
     *
     * @dataProvider provide_empty_string_array_data
     *
     * @param array $array The array to filter.
     * @param array $expected_result The expected filtered result.
     */
    public function test_filter_empty_strings_from_array(array $array, array $expected_result): void {
        $result = filter_empty_strings_from_array($array);

        self::assertIsArray($result);
        self::assertSame($expected_result, $result);
    }
}
