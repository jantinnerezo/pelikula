<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class MovieDbService
{
    protected $url = 'https://api.themoviedb.org';
    protected $version = 4;
    protected $http;

    public function __construct()
    {
        $this->http = Http::withHeaders([
            'Content-Type' => 'application/json;charset=utf-8',
            'access-control-allow-credentials' => true
        ]);
    }

    public function list(array $query = []): Collection
    {
       return collect($this->source($query)['results']);
    }

    public function show($id)
    {
        $this->version = 3;

        return $this->http->get(
            "{$this->url()}/movie/{$id}",
            collect($this->queryStrings())->only('api_key')->toArray()
        )->json();
    }

    public function source(array $query = [])
    {
        return $this->http->get(
            "{$this->url()}/list/1",
            array_merge($this->queryStrings(), $query)
        )->json();
    }

    protected function url(): string
    {
        return "{$this->url}/{$this->version}";
    }

    protected function queryStrings()
    {
        return [
            'page' => 1,
            'api_key' => config('app.api_key'),
            'sort_by' => 'vote_average.desc'
        ];
    }
}