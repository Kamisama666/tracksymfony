<?php

class GithubAPIServiceTest extends TestCase {

	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function testGet() {

		$github = new TrackSymfony\Services\GithubAPIService();
		$response = $github->get('/repos/symfony/symfony');
		$this->assertTrue($response->isSuccesful());
	}
}
