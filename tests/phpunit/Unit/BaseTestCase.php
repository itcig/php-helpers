<?php

namespace Cig\Tests\Unit;

use function Cig\auto_load_from_path;

class BaseTestCase extends \Cig\PHPUnit\Unit\TestCase {

	protected function setUp(): void {
		parent::setUp();
		auto_load_from_path(PHP_HELPERS_PATH . 'src/functions', PHP_HELPERS_PATH);
	}
}
