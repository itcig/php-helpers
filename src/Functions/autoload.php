<?php
/**
 * Autoload functions
 *
 * @package itcig/php-helpers
 */

namespace Cig;

if (!function_exists('\\Cig\\auto_load_from_path')) {
    /**
     * Load all .php files from a given directory
     *
     * @param string $load_path The directory path to load from.
     * @param string $root_path The repository's root dir.
     */
    function auto_load_from_path(string $load_path, string $root_path): void {
        if (!file_exists($load_path) && file_exists($root_path . $load_path)) {
            $path = $root_path . $load_path;
        }

        foreach (new \DirectoryIterator($load_path) as $fileInfo) {
            if ($fileInfo->isDot()) {
                continue; // Ignore hidden files
            }
            require_once($fileInfo->getPathname());
        }
    }
}
