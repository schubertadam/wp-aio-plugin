<?php
function error( string $message ): void {
	add_action( 'admin_notices', function () use ( $message ) {
		echo "<div class='error notice'><p>{$message}</p></div>";
	} );
}