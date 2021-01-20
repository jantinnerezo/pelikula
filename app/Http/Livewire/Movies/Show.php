<?php

namespace App\Http\Livewire\Movies;

use Livewire\Component;

use App\Services\MovieDbService;
use Carbon\Carbon;

class Show extends Component
{
    protected $movieService;
    public $movie;

    public function mount($movie)
    {
        $this->movie = $movie;
    }

    public function getMovieDetailsProperty()
    {
        $this->movieService = new MovieDbService;

        $movie = $this->movieService->show($this->movie);

        $movie['poster_path'] = "https://image.tmdb.org/t/p/w500{$movie['poster_path']}";
        $movie['release_date'] = Carbon::parse($movie['release_date'])->format('M j, Y');

        return $movie;
    }

    public function render()
    {
        return view('livewire.movies.show', [
                'details' => $this->movieDetails
            ])
            ->layout('components.layout');
    }
}
