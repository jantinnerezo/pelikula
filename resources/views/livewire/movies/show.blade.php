<div>
    <article class="prose mx-auto my-12 px-4 sm:px-0">
        <div>
            <x-ui::button.link href="/"> Go Back </x-ui::button.link>
            <h1 class="my-0"> {{ $details['title'] }} </h1>
            <h3 class="mt-0 text-cool-gray-600">{{ $details['release_date'] }}</h3>
        </div>
        <div class="aspect-w-full aspect-h-9">
            <img src="{{ $details['poster_path'] }}" alt="{{ $details['title'] }} Poster" class="m-0">
        </div>
        <p> Votes: {{ $details['vote_average'] }} </p>
        <p>
            {{ $details['overview'] }}
        </p>
    </article>
</div>
