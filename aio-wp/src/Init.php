<?php

namespace Src;

use Src\Core\Loader;

class Init {
	/**
	 * Loop through the classes and initialize them
	 * If register methods exists inside class then calls it
	 * @return void
	 */
	public function register_services(): void {
		foreach ( $this->get_services() as $service ) {
			call_register_method_if_exists( $service );
		}
	}

	/**
	 * Here you can store all the classes you want to register on load
	 * @return array
	 */
	private function get_services(): array {
		return [
			Loader::class
		];
	}
}