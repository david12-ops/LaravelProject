<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('cds.update',$Cd) }}">
            @csrf
            @method('patch')
            <label for="name">Název</label>
            <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ old('name', $Cd->name)}}" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <label for="year">Rok</label>
            <input type="number" id="year" name="year" class="@error('year') is-invalid @enderror block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ old('year', $Cd->year)}}" />
            <x-input-error :messages="$errors->get('year')" class="mt-2" />

            <label for="genre_id">Vyber žánr:</label>
            <select name="genre_id" id="genre_id" class="@error('genre_id') is-invalid @enderror block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($genres as $genre)
                <option value="{{$genre->id}}" @if ($genre->id==old("genre_id", $Cd->genre?->id))
                    selected="selected"
                    @endif>{{ $genre->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('genre_id')" class="mt-2" />

            <label for="author_id">Vyber autora:</label>
            <select name="author_id" id="author_id" class="@error('author_id') is-invalid @enderror block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($authors as $author)
                <option value="{{ $author->id }}" @if ($author->id==old("auth_id", $Cd->author->id))
                    selected="selected"
                    @endif
                    >{{ $author->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('author_id')" class="mt-2" />
            <x-primary-button class="mt-4">Odeslat</x-primary-button>
        </form>

    </div>

</x-app-layout>