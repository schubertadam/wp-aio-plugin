<?php

namespace Src\Core\Api;

use WP_REST_Response;
use wpdb;

class Route {
	protected wpdb $db;
	protected RestClient $api;

	public function __construct() {
		global $wpdb;

		$this->db = $wpdb;
		$this->api = RestClient::getInstance();
	}

	/**
	 * Create a success response for an API request
	 *
	 * @param string $message
	 * @param array $data
	 * @param int $httpResponseCode
	 *
	 * @return WP_REST_Response
	 */
	public function success( string $message, array $data = [], int $httpResponseCode = HttpResponse::HTTP_OK ): WP_REST_Response {
		return $this->response(true, 0, $httpResponseCode, $message, $data);
	}

	/**
	 * Create an error response for an API request
	 *
	 * @param string $message
	 * @param array $data
	 * @param int $httpResponseCode
	 *
	 * @return WP_REST_Response
	 */
	public function error( string $message, array $data = [], int $httpResponseCode = HttpResponse::HTTP_BAD_REQUEST ): WP_REST_Response {
		return $this->response(false, 1, $httpResponseCode, $message, $data);
	}

	/**
	 * Create a WP_Rest_Response for frontend development
	 *
	 * @param bool $success
	 * @param int $status
	 * @param int $httpResponseCode
	 * @param string $message
	 * @param array $data
	 *
	 * @return WP_REST_Response
	 */
	private function response( bool $success, int $status, int $httpResponseCode, string $message, array $data ): WP_REST_Response {
		return new WP_REST_Response([
			'success' => $success,
			'status' => $status,
			'message' => $message,
			'data' => $data
		], $httpResponseCode);
	}
}