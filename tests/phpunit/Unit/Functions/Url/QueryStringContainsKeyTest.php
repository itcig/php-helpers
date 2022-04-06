<?php

namespace Cig\Tests\Unit\Functions\Url;

use Cig\Tests\Unit\BaseTestCase;

/**
 * @covers \Cig\query_string_contains_key
 */
class QueryStringContainsKeyTest extends BaseTestCase {
    final public function provideQueryStringContainsKeyData(): array {
        return [
            'no_query_string' => [
                'hot_dog_cart',
                'https://www.investingdaily.com/contact/',
                false,
            ],
            'query_string_missing_key' => [
                'mustard',
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true',
                false,
            ],
            'query_string_contains_key' => [
                'hot_dog_cart',
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true',
                true,
            ],
            'query_string_contains_multiple_similar_keys' => [
                'hot_dog_cart',
                'https://www.investingdaily.com/contact/?hot_dog_cart=party_time&ketchup_face=yes&party=true&hot_dog_carts=more_carts',
                true,
            ],
        ];
    }

    /**
     * @dataProvider provideQueryStringContainsKeyData
     */
    final public function testQueryStringContains(string $key, string $url, bool $expected_result): void {
        self::assertSame($expected_result, \Cig\query_string_contains_key($key, $url));
    }
}
