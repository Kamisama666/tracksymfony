<?php
namespace TrackSymfony\Services;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use TrackSymfony\Contracts\GithubAPIContract;
use TrackSymfony\Services\GithubAPI\GithubAPIResponse;

class GithubAPIService implements GithubAPIContract {

	private $client;

	public function __construct() {
		$this->client = new Client([
			'base_uri' => config('github.rootpath'),
			'timeout' => 5.0,
		]);
	}

	/**
	 * Gets an API resource
	 *
	 * @param  string $path       The path
	 * @param  array $parameters The URL parameters
	 * @return TrackSymfony\Services\GithubAPI\GithubAPIResponse  The respose
	 */
	public function get($path, $parameters = null) {
		return $this->request('GET', $path, $parameters);
	}

	/**
	 * Posts an API resource
	 *
	 * @param  string $path       The path
	 * @param  array $parameters The URL parameters
	 * @param  array $body The bodu of the request
	 * @return TrackSymfony\Services\GithubAPI\GithubAPIResponse  The respose
	 */
	public function post($path, $parameters = null, $body = null) {
		return $this->request('POST', $path, $parameters, $body);
	}

	/**
	 * Puts an API resource
	 *
	 * @param  string $path       The path
	 * @param  array $parameters The URL parameters
	 * @param  array $body The bodu of the request
	 * @return TrackSymfony\Services\GithubAPI\GithubAPIResponse  The respose
	 */
	public function put($path, $parameters = null, $body = null) {
		return $this->request('PUT', $path, $parameters, $body);
	}

	/**
	 * Deletes an API resource
	 *
	 * @param  string $path       The path
	 * @return TrackSymfony\Services\GithubAPI\GithubAPIResponse  The respose
	 */
	public function delete($path) {
		return $this->request('DELETE', $path);
	}

	/**
	 * Makes the request
	 * @param  [type] $method     [description]
	 * @param  [type] $path       [description]
	 * @param  [type] $parameters [description]
	 * @param  [type] $body       [description]
	 * @return [type]             [description]
	 */
	private function request($method, $path, $parameters = null, $body = null) {

		if (!in_array($method, ['GET', 'PUT', 'POST', 'DELETE'])) {
			return false;
		}

		$path = trim($path, '/');

		$arguments = [
			'http_errors' => false,
		];

		if ($parameters) {
			$arguments['query'] = $parameters;
		}

		if ($body) {
			$arguments['query'] = $body;
		}

		$response = $this->client->request($method, $path, $arguments);

		$statusCode = $response->getStatusCode();

		$body = $this->extractBody($response);

		return new GithubAPIResponse($statusCode, $body);
	}

	/**
	 * Extracts the body from the response
	 * @param  [type] $body [description]
	 * @return [type]       [description]
	 */
	private function extractBody(ResponseInterface $response) {
		return json_decode($response->getBody()->getContents(), true);
	}
}