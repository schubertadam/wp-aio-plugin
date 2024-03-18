<?php

namespace Src\Core;

use Src\Interfaces\RegisterInterface;

class Loader implements RegisterInterface {

	public function register(): void {
		iterate_trough_files_and_call_register_method(AIO_ROOT . "/src/WPSettings/", "Src\\WPSettings\\");
	}
}