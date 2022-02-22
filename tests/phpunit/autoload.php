<?php
/**
 * Autoload testing resources
 *
 * @package itcig/php-helpers
 */

// Include composer and CIG Function autoloader
require_once(PHP_HELPERS_PATH . '/vendor/autoload.php');

foreach (new DirectoryIterator(PHP_HELPERS_PATH . '/src/Functions') as $fileInfo) {
    if ($fileInfo->isDot()) {
        continue;
    } //Ignore hidden files
    require_once $fileInfo->getPathname();
}
