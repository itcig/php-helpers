<?php

/**
 *  Autorequire everything in /src/functions
 *
 */
foreach (new DirectoryIterator(__DIR__ . '/functions') as $fileInfo) {
	if($fileInfo->isDot()) continue; //Ignore hidden files
	require_once $fileInfo->getPathname();
}

unset($fileInfo);

//
// TODO: autoload.php can replace current function autoloader above:
//require_once(__DIR__ . '/functions/autoload.php');
//\Cig\auto_load_from_path(__DIR__ . '/functions', __DIR__ . '/../');
//
