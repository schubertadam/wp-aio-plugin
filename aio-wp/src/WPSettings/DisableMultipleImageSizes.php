<?php

namespace Src\WPSettings;

use Src\Interfaces\RegisterInterface;

class DisableMultipleImageSizes implements RegisterInterface {

	public function register(): void {
		/** Use these settings for advance customization
		 *
		 * unset($sizes['thumbnail']);  // Remove thumbnail size
		 * unset($sizes['medium']);     // Remove medium size
		 * unset($sizes['medium_large']); // Remove medium_large size
		 * unset($sizes['large']);      // Remove large size
		 *
		 * return $sizes;
		 *
		 */

		add_filter( 'big_image_size_threshold', '__return_false' );

		add_filter( 'intermediate_image_sizes_advanced', '__return_empty_array' );

		add_filter( 'image_size_names_choose', '__return_empty_array' );
	}
}