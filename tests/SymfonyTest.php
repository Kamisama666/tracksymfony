<?php

class SymfonyTest extends TestCase {

	/**
	 * Can get the repo's main info
	 *
	 * @return void
	 */
	public function testGetRepository() {
		$symfony = app(TrackSymfony\Contracts\SymfonyContract::class);
		$response = $symfony->getRespository();
		$this->assertTrue($response->isSuccesful());

		$content = $response->getContent();
		$this->assertArrayHasKey('name', $content);
	}

	/**
	 * Can get the repo's contributors info
	 *
	 * @return void
	 */
	public function testGetContributors() {
		$symfony = app(TrackSymfony\Contracts\SymfonyContract::class);
		$response = $symfony->getContributors();
		$this->assertTrue($response->isSuccesful());

		$content = $response->getContent();
		$this->assertArrayHasKey('login', $content[0]);

		$response = $symfony->getContributors(1, 5);
		$this->assertTrue($response->isSuccesful());

		$content = $response->getContent();
		$this->assertLessThanOrEqual(5, count($response));
	}

	/**
	 * Can get the repo's contributors info
	 *
	 * @return void
	 */
	public function testGetCommits() {
		$symfony = app(TrackSymfony\Contracts\SymfonyContract::class);
		$response = $symfony->getCommits();
		$this->assertTrue($response->isSuccesful());

		$content = $response->getContent();
		$this->assertArrayHasKey('commit', $content[0]);

		$response = $symfony->getCommits(1, 5);
		$this->assertTrue($response->isSuccesful());

		$content = $response->getContent();
		$this->assertLessThanOrEqual(5, count($response));
	}

	/**
	 * Can get the repo's issues info
	 *
	 * @return void
	 */
	public function testGetIssues() {
		$symfony = app(TrackSymfony\Contracts\SymfonyContract::class);
		$response = $symfony->getIssues();
		$this->assertTrue($response->isSuccesful());

		$content = $response->getContent();
		$this->assertArrayHasKey('title', $content[0]);

		$response = $symfony->getIssues(1, 5);
		$this->assertTrue($response->isSuccesful());

		$content = $response->getContent();
		$this->assertLessThanOrEqual(5, count($response));
	}

	/**
	 * Can get the repo's pull requests info
	 *
	 * @return void
	 */
	public function testGetPullRequests() {
		$symfony = app(TrackSymfony\Contracts\SymfonyContract::class);
		$response = $symfony->getPullRequests();
		$this->assertTrue($response->isSuccesful());

		$content = $response->getContent();
		$this->assertArrayHasKey('number', $content[0]);

		$response = $symfony->getPullRequests(1, 5);
		$this->assertTrue($response->isSuccesful());

		$content = $response->getContent();
		$this->assertLessThanOrEqual(5, count($response));
	}
}
