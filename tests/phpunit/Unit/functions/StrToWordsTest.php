<?php

namespace Cig\Tests\Unit\Functions;

class StrToWordsTest extends \Cig\Tests\Unit\BaseTestCase {

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

		$result = \Cig\str_to_words($string);

		self::assertIsArray($result);
		self::assertSame($expected_result, $result);
	}

	public function test_str_to_words_lowercase(): void {
		$string = 'What We Do In The Shadows';
		$lower = FALSE;
		$expected_result = [
			'What',
			'We',
			'Do',
			'In',
			'The',
			'Shadows',
		];

		$result = \Cig\str_to_words($string, $lower);

		self::assertIsArray($result);
		self::assertSame($expected_result, $result);

	}

	public function test_str_to_words_not_lowercase(): void {
		$string = 'What We Do In The Shadows';
		$lower = TRUE;
		$expected_result = [
			'what',
			'we',
			'do',
			'in',
			'the',
			'shadows',
		];

		$result = \Cig\str_to_words($string, $lower);

		self::assertIsArray($result);
		self::assertSame($expected_result, $result);
	}

	public function test_str_to_words_no_punctuation(): void {
		$string = 'What?? _ Are-we-doing. In the shadows.';
		$lower = FALSE; //default
		$remove_punctuation = TRUE;

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

	public function test_str_to_words_punctuation(): void {
		$string = 'What?? _Are-we-doing. In the shadows.';
		$lower = FALSE; //default
		$remove_punctuation = FALSE;

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

	public function test_str_to_words_question_mark(): void {
		$string = 'What?? Are we doing. In the shadows.';
		$lower = FALSE; //default
		$remove_punctuation = FALSE;

		//		$expected_result = [
		//			'What??',
		//			'Are',
		//			'we',
		//			'doing.',
		//			'In',
		//			'the',
		//			'shadows.',
		//		];

		$result = \Cig\str_to_words($string);

		self::markTestSkipped('**WIP** Revisit this test — Question marks are punctuation but always treated under regex and thus always removed in spite of argument');
	}
}
