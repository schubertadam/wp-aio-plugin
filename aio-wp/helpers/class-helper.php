<?php

use Src\Interfaces\RegisterInterface;

/**
 * Create an object from the given class
 * @param string $class
 *
 * @return mixed the instance
 */
function instantiate( string $class ): mixed {
	return new $class();
}

/**
 * Create an object from the given class
 * If register methods exists inside class then calls it
 *
 * TODO: log if called class is not instanceof RegisterInterface
 *
 * @param mixed $class
 *
 * @return void
 */
function call_register_method_if_exists( mixed $class ): void {
	$class = instantiate( $class );

	if ( $class instanceof RegisterInterface ) {
		$class->register();
	}
}

/**
 * Iterate through $root directory and call the register method
 * If the given element is a directory, then iterate through it as well
 * @param string $root
 * @param string $namespace
 *
 * @return void
 */
function iterate_trough_files_and_call_register_method( string $root, string $namespace ): void {
	$items = new DirectoryIterator( $root );

	/** @var DirectoryIterator $item */
	foreach ( $items as $item ) {
		if ( ! $item->isDot() ) {
			if ( $item->isFile() && $item->getExtension() === 'php' ) {
				$fileName = pathinfo( $item->getFilename(), PATHINFO_FILENAME );
				call_register_method_if_exists($namespace . $fileName );
			}

			// In case of directory we will scan it as well
			if ( $item->isDir() ) {
				$subdirectory = $root . "/" . $item->getFilename();
				$subNamespace = $namespace . $item->getFilename() . "\\";
				iterate_trough_files_and_call_register_method( $subdirectory, $subNamespace );
			}
		}
	}
}