<?php
/**
 * Base Integration Test
 *
 * @package itcig/php-helpers
 */

namespace Cig\Tests\Integration;

use Cig\PHPUnit\Integration\TestCase;

use function Cig\auto_load_from_path;

/**
 * Class BaseTestCase
 */
class BaseTestCase extends TestCase {
    /**
     * Setup method
     */
    protected function setUp(): void {
        parent::setUp();
        auto_load_from_path(PHP_HELPERS_PATH . 'src/Functions', PHP_HELPERS_PATH);
    }
}
