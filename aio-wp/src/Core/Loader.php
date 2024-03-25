<?php

namespace Src\Core;

use Src\Interfaces\RegisterInterface;

class Loader implements RegisterInterface {

	public function register(): void {
		if ( get_option( 'permalink_structure' ) !== "/%postname%/" ) {
			error("Set permalink to the following: /%postname%/");
		} else {
			iterate_trough_files_and_call_register_method(AIO_ROOT . "/src/Routes/", "Src\\Routes\\");
		}

		iterate_trough_files_and_call_register_method(AIO_ROOT . "/src/WPSettings/", "Src\\WPSettings\\");
	}
}