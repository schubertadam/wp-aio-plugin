<?php

namespace Src\WPSettings;

use Src\Interfaces\RegisterInterface;

class RaiseUploadSizeLimit implements RegisterInterface {
	private int $max_size_in_mb = 10;

	public function register(): void {
		add_filter( 'upload_size_limit', function ( int $max_upload_size ) {
			return $this->max_size_in_mb * 1024 * 1024;
		}, 20);
	}
}