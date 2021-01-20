<div>
    <div class="prose mx-auto px-4 sm:px-0 my-12">
        <h1> Movies </h1>
        <div class="flex items-center justify-between mb-6">
            <x-ui::input.label class="flex items-center space-x-2">
                <x-ui::input.checkbox wire:model="popular" />
                <x-ui::input.label value="Popular" />
            </x-ui::input.label>
            <x-ui::input.select name="page" wire:model="page" class="rounded-md">
                @for ($x = 1; $x <= $pagination['total_pages']; $x ++)
                    <option value="{{ $x }}">
                        {{ 'Page ' . $x }}
                    </option>
                @endfor
            </x-ui::input.select>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
            @foreach($movies as $movie)
                <a href="{{ route('show', $movie['id']) }}" class="no-underline hover:opacity-50 transition-all duration-75">
                    <div class="relative aspect-w-full aspect-h-9"  wire:key="row-{{ $movie['id'] }}" wire:loading.class.delay="opacity-50">
                        <div class="absolute flex items-center justify-center flex-col rounded-full bg-green-600 h-10 w-10 right-0 -mr-2 -mt-4">
                            <p class="m-0 text-green-100 font-bold">{{ $movie['votes'] }}</p>
                        </div>
                        <img src="{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }} Poster" class="m-0">
                        <h4 class="my-1">{{ $movie['title'] }}</h4>
                        <h5 class="mt-0 text-cool-gray-600">{{ $movie['release_date'] }}</h5>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
