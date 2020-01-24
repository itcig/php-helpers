<?php

/**
 *  Autorequire everything in /src/functions
 */
foreach (new DirectoryIterator(__DIR__ . '/functions') as $fileInfo) {
	if($fileInfo->isDot()) continue; //Ignore hidden files
	require_once $fileInfo->getPathname();
}

unset($fileInfo);
