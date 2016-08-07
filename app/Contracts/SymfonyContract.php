<?php
namespace TrackSymfony\Contracts;

interface SymfonyContract {

	public function getRespository();

	public function getContributors($page = 1, $limit = 30);

	public function getCommits($page = 1, $limit = 30);

	public function getIssues($page = 1, $limit = 30);

	public function getPullRequests($page = 1, $limit = 30);
}