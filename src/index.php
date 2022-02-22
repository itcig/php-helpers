<?php
/**
 * Autorequire everything in /src/functions
 *
 * @package itcig/php-helpers
 */

foreach (new DirectoryIterator(__DIR__ . '/Functions') as $fileInfo) {
    if ($fileInfo->isDot()) {
        continue;
    } //Ignore hidden files
    require_once $fileInfo->getPathname();
}

unset($fileInfo);
