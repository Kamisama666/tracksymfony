<?php

namespace TrackSymfony\Providers;

use Illuminate\Support\ServiceProvider;
use TrackSymfony\Contracts\GithubAPIContract;
use TrackSymfony\Services\GithubAPIService;

class GithubAPIProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(GithubAPIContract::class, function () {
			return new GithubAPIService;
		});
	}
}
