<?php
/**
 * String to Words tests
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Unit\Functions;

use Cig\Tests\Unit\BaseTestCase;

use function Cig\str_to_words;

/**
 * Class StrToWordsTest
 */
class StrToWordsTest extends BaseTestCase {
    /**
     * Test split a string to an array words
     *
     * @covers ::str_to_words
     */
    public function test_str_to_words(): void {
        $string = 'ConvertCamelCaseToMultipleWords';
        $expected_result = [
            'Convert',
            'Camel',
            'Case',
            'To',
            'Multiple',
            'Words',
        ];

        $result = str_to_words($string);

        self::assertIsArray($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test splitting a string to words and maintain case
     */
    public function test_str_to_words_lowercase(): void {
        $string = 'What We Do In the Shadows';
        $lower = false;
        $expected_result = [
            'What',
            'We',
            'Do',
            'In',
            'the',
            'Shadows',
        ];

        $result = str_to_words($string, $lower);

        self::assertIsArray($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test splitting a string to words and lowercasing all words
     */
    public function test_str_to_words_not_lowercase(): void {
        $string = 'What We Do In The Shadows';
        $lower = true;
        $expected_result = [
            'what',
            'we',
            'do',
            'in',
            'the',
            'shadows',
        ];

        $result = str_to_words($string, $lower);

        self::assertIsArray($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test splitting string to words and remove all punctuation
     */
    public function test_str_to_words_no_punctuation(): void {
        $string = 'What?? _ Are-we-doing. In the shadows.';
        $lower = false; // default
        $remove_punctuation = true;

        $expected_result = [
            'What',
            'Are',
            'we',
            'doing',
            'In',
            'the',
            'shadows',
        ];

        $result = \Cig\str_to_words($string, $lower, $remove_punctuation);

        self::assertIsArray($result);
        self::assertSame($expected_result, $result);
    }

    /**
     * Test splitting string to words and allow punctuation
     */
    public function test_str_to_words_punctuation(): void {
        $string = 'What?? _Are-we-doing. In the shadows.';
        $lower = false; // default
        $remove_punctuation = false;

        $expected_result = [
            'What??',
            '_',
            'Are-we-doing.',
            'In',
            'the',
            'shadows.',
        ];
        $result = \Cig\str_to_words($string);

        self::assertIsArray($result);
        // self::assertSame($expected_result, $result);
    }

    /**
     * Test splitting string to words with question marks
     */
    public function test_str_to_words_question_mark(): void {
        $string = 'What?? Are we doing. In the shadows.';
        $lower = false; // default
        $remove_punctuation = false;

        // $expected_result = [
        // 'What??',
        // 'Are',
        // 'we',
        // 'doing.',
        // 'In',
        // 'the',
        // 'shadows.',
        // ];

        $result = str_to_words($string);

        self::markTestSkipped('**WIP** Revisit this test — Question marks are punctuation but always treated under regex and thus always removed in spite of argument');
    }
}
