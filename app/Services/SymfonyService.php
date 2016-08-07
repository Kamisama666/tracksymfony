<?php
namespace TrackSymfony\Services;

use TrackSymfony\Contracts\SymfonyContract;
use TrackSymfony\Services\Interfaces\APIInterface;

class SymfonyService implements SymfonyContract {

	private $api;
	private $root;

	public function __construct(APIInterface $api) {
		$this->api = $api;
		$this->root = config('symfony.reporsitory_root');
	}

	public function getRespository() {
		return $this->api->get($this->root);
	}

	public function getContributors($page = 1, $limit = 30) {
		return $this->api->get($this->root . 'contributors', [
			'page' => (int) $page,
			'per_page' => (int) $limit,
		]);
	}

	public function getCommits($page = 1, $limit = 30) {
		return $this->api->get($this->root . 'commits', [
			'page' => (int) $page,
			'per_page' => (int) $limit,
		]);
	}

	public function getIssues($page = 1, $limit = 30) {
		return $this->api->get($this->root . 'issues', [
			'page' => (int) $page,
			'per_page' => (int) $limit,
		]);
	}

	public function getPullRequests($page = 1, $limit = 30) {
		return $this->api->get($this->root . 'pulls', [
			'page' => (int) $page,
			'per_page' => (int) $limit,
		]);
	}
}