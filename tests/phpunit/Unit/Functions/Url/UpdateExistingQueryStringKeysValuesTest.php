<?php

namespace Cig\Tests\Unit\Functions\Url;

use Cig\Tests\Unit\BaseTestCase;

/**
 * @covers \Cig\update_existing_query_string_keys_values
 */
class UpdateExistingQueryStringKeysValuesTest extends BaseTestCase {
    final public function provideUpdateExistingQueryStringKeysValuesData(): array {
        return [
            'no_query_string_with_single_update_param' => [
                [
                    'hot_dog_cart' => 'stoked'
                ],
                'https://www.investingdaily.com/contact/',
                'https://www.investingdaily.com/contact/',
            ],
            'query_string_missing_key_with_single_update_param' => [
                [
                    'mustard' => 'is_yellow'
                ],
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true',
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true',
            ],
            'query_string_contains_single_matching_key_with_single_update_param' => [
                [
                    'hot_dog_cart' => 'stoked'
                ],
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true',
                'https://www.investingdaily.com/contact/?hot_dog_cart=stoked&ketchup_face=yes&party=true',
            ],
            'query_string_contains_single_matching_and_multiple_similar_keys_with_single_update_param' => [
                [
                    'hot_dog_cart' => 'stoked'
                ],
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true&hot_dog_carts=more_carts',
                'https://www.investingdaily.com/contact/?hot_dog_cart=stoked&ketchup_face=yes&party=true&hot_dog_carts=more_carts',
            ],
            'no_query_string_with_multiple_update_params' => [
                [
                    'hot_dog_cart' => 'stoked',
                    'mustard' => 'is_yellow',
                ],
                'https://www.investingdaily.com/contact/',
                'https://www.investingdaily.com/contact/',
            ],
            'query_string_missing_multiple_keys_with_multiple_update_params' => [
                [
                    'mustard' => 'is_yellow',
                    'chili' => 'cheese',
                ],
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true',
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true',
            ],
            'query_string_contains_single_key_with_multiple_update_params' => [
                [
                    'hot_dog_cart' => 'stoked',
                    'mustard' => 'is_yellow',
                    'chili' => 'cheese',
                ],
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true',
                'https://www.investingdaily.com/contact/?hot_dog_cart=stoked&ketchup_face=yes&party=true',
            ],
            'query_string_contains_single_matching_key_and_multiple_similar_keys_with_multiple_update_params' => [
                [
                    'hot_dog_cart' => 'stoked',
                    'mustard' => 'is_yellow',
                    'chili' => 'cheese',
                ],
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true&hot_dog_carts=more_carts&mustard2=yellow',
                'https://www.investingdaily.com/contact/?hot_dog_cart=stoked&ketchup_face=yes&party=true&hot_dog_carts=more_carts&mustard2=yellow',
            ],
            'query_string_contains_multiple_matching_keys_with_multiple_update_params' => [
                [
                    'hot_dog_cart' => 'stoked',
                    'mustard' => 'is_yellow',
                    'chili' => 'cheese',
                ],
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true&mustard=none',
                'https://www.investingdaily.com/contact/?hot_dog_cart=stoked&ketchup_face=yes&party=true&mustard=is_yellow',
            ],
        ];
    }

    /**
     * @dataProvider provideUpdateExistingQueryStringKeysValuesData
     */
    final public function testQueryStringContains(array $params, string $url, string $expected_result): void {
        self::assertSame($expected_result, \Cig\update_existing_query_string_keys_values($params, $url));
    }
}
