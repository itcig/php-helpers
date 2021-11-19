<?php

namespace Cig\Tests\Integration;

use function Cig\auto_load_from_path;

class BaseTestCase extends \Cig\PHPUnit\Unit\TestCase {

	protected function setUp(): void {
		parent::setUp();
		auto_load_from_path(PHP_HELPERS_PATH . 'src/Functions', PHP_HELPERS_PATH);
	}
}
