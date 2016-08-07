<?php
namespace TrackSymfony\Services\GithubAPI;

use TrackSymfony\Services\Interfaces\APIResponse;

class GithubAPIResponse implements APIResponse {

	private $succesful;
	private $content;
	private $errors;

	/**
	 * GithubAPIResponse constructor
	 *
	 * @param int $statusCode The status code of the response
	 * @param array $body       The body of the response
	 */
	public function __construct($statusCode, $body) {

		if ($statusCode !== 200) {
			return $this->buildErrorResponse($body);
		}

		$this->succesful = true;
		$this->content = $body;
		$this->errors = [];
	}

	/**
	 * Is the response succesful
	 * @return boolean
	 */
	public function isSuccesful() {
		return $this->succesful;
	}

	/**
	 * Gets the content of the response
	 * @return array The content of the response
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Gets the erros of the response
	 * @return array The errors of the response
	 */
	public function getErrors() {
		return $this->errors;
	}

	/**
	 * Buils the response for an error
	 * @param  [type] $body The body of the response
	 */
	private function buildErrorResponse($body) {

		$this->succesful = false;

		$this->content = $body['message'];

		$this->errors = [];

		if (array_key_exists('errors', $body)) {
			$this->errors = $body['errors'];
		}
	}
}