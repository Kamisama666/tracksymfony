<?php
namespace TrackSymfony\Services\Interfaces;

interface APIInterface {
	/**
	 * Gets an API resource
	 *
	 * @param  string $path       The path
	 * @param  array $parameters The URL parameters
	 * @return TrackSymfony\Services\GithubAPI\GithubAPIResponse The respose
	 */
	public function get($path, $parameters = null);

	/**
	 * Posts an API resource
	 *
	 * @param  string $path       The path
	 * @param  array $parameters The URL parameters
	 * @param  array $body The bodu of the request
	 * @return TrackSymfony\Services\GithubAPI\GithubAPIResponse The respose
	 */
	public function post($path, $parameters = null, $body = null);

	/**
	 * Puts an API resource
	 *
	 * @param  string $path       The path
	 * @param  array $parameters The URL parameters
	 * @param  array $body The bodu of the request
	 * @return TrackSymfony\Services\GithubAPI\GithubAPIResponse The respose
	 */
	public function put($path, $parameters = null, $body = null);

	/**
	 * Deletes an API resource
	 *
	 * @param  string $path       The path
	 * @return TrackSymfony\Services\GithubAPI\GithubAPIResponse The respose
	 */
	public function delete($path);
}