<?php

namespace Src\WPSettings;

use Src\Interfaces\RegisterInterface;

class ConvertImagesToWebp implements RegisterInterface {
	// TODO: save the setting to DB
	private int $quality = 75;
	private array $supportedFileTypes = [
		'jpg',
		'jpeg',
		'png'
	];

	public function register(): void {
		add_filter( 'wp_handle_upload', function ( array $file ) {
			if ( function_exists( 'imagewebp' ) ) {
				$file = $file['file'];
				$extension = strtolower( pathinfo( $file )['extension'] );

				// Only convert if the file is an image
				if ( in_array( $extension, $this->supportedFileTypes ) ) {
					$image = imagecreatefromstring( file_get_contents( $file ) );
					$image_webp_name = str_replace( $extension, 'webp', $file);

					if ( ! imagewebp( $image, $image_webp_name, $this->quality ) ) {
						return [
							'error' => "Failed to convert the image to WebP format."
						];
					}

					// Clean up the GD image resources
					imagedestroy( $image );

					// Delete the original image
					unlink( $file );

					// Update the file array with the WebP file path and MIME type
					return [
						'file' => $image_webp_name,
						'type' => 'image/webp',
						'ext' => 'webp',
					];
				}
			}

			return $file;
		} );
	}
}