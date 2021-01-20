<?php

namespace App\Http\Livewire\Movies;

use Livewire\Component;

use App\Services\MovieDbService;
use Carbon\Carbon;

class Index extends Component
{
    protected $movieService;

    public $popular = false;
    public $page = 1;

    protected $queryString = ['popular','page'];

    public function getMoviesProperty()
    {
        $this->movieService = new MovieDbService();

        return $this->movieService->list([
            'sort_by' => $this->popular ? 'vote_average.desc' : 'vote_average.asc',
            'page' => $this->page
        ])
            ->transform(fn ($movie) => [
                'id' => $movie['id'],
                'poster_path' => "https://image.tmdb.org/t/p/w500{$movie['poster_path']}",
                'title' => $movie['title'],
                'overview' => $movie['overview'],
                'votes' => $movie['vote_average'],
                'release_date' => Carbon::parse($movie['release_date'])->format('M j, Y')
            ])
            ->toArray();
    }

    public function getPaginationProperty()
    {
        return collect($this->movieService->source())->only([
            'page',
            'total_pages',
            'total_results'
        ])->toArray();
    }

    public function render()
    {
        return view('livewire.movies.index', [
            'movies' => $this->movies,
            'pagination' => $this->pagination
        ])
        ->layout('components.layout');
    }
}
