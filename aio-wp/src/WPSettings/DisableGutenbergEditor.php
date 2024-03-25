<?php

namespace Src\WPSettings;

use Src\Interfaces\RegisterInterface;

class DisableGutenbergEditor implements RegisterInterface {

	public function register(): void {
		// TODO: make it optional
		add_filter('use_block_editor_for_post', '__return_false');
	}
}