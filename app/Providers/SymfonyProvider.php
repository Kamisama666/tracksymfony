<?php

namespace TrackSymfony\Providers;

use Illuminate\Support\ServiceProvider;
use TrackSymfony\Contracts\GithubAPIContract;
use TrackSymfony\Contracts\SymfonyContract;
use TrackSymfony\Services\SymfonyService;

class SymfonyProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(SymfonyContract::class, function () {
			$api = app(GithubAPIContract::class);
			return new SymfonyService($api);
		});
	}
}
