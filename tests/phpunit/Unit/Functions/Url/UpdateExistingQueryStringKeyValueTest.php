<?php

namespace Cig\Tests\Unit\Functions\Url;

use Cig\Tests\Unit\BaseTestCase;

/**
 * @covers \Cig\update_existing_query_string_key_value
 */
class UpdateExistingQueryStringKeyValueTest extends BaseTestCase {
    final public function provideUpdateExistingQueryStringKeyValueData(): array {
        return [
            'no_query_string' => [
                'hot_dog_cart',
                'stoked',
                'https://www.investingdaily.com/contact/',
                'https://www.investingdaily.com/contact/',
            ],
            'query_string_missing_key' => [
                'mustard',
                'is_yellow',
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true',
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true',
            ],
            'query_string_contains_key' => [
                'hot_dog_cart',
                'stoked',
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true',
                'https://www.investingdaily.com/contact/?hot_dog_cart=stoked&ketchup_face=yes&party=true',
            ],
            'query_string_contains_multiple_similar_keys' => [
                'hot_dog_cart',
                'stoked',
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true&hot_dog_carts=more_carts',
                'https://www.investingdaily.com/contact/?hot_dog_cart=stoked&ketchup_face=yes&party=true&hot_dog_carts=more_carts',
            ],
        ];
    }

    /**
     * @dataProvider provideUpdateExistingQueryStringKeyValueData
     */
    final public function testQueryStringContains(string $key, string $value, string $url, string $expected_result): void {
        self::assertSame($expected_result, \Cig\update_existing_query_string_key_value($key, $value, $url));
    }
}
