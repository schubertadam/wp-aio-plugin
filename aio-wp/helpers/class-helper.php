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