<?php
namespace TrackSymfony\Services\Interfaces;

interface APIResponse {

	/**
	 * Is the response succesful
	 * @return boolean
	 */
	public function isSuccesful();

	/**
	 * Gets the content of the response
	 * @return array The content of the response
	 */
	public function getContent();

	/**
	 * Gets the erros of the response
	 * @return array The errors of the response
	 */
	public function getErrors();
}