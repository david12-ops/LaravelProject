<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('authors.store') }}">
            @csrf
            <label for="name">Jméno</label>
            <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ old('name')}}" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <label for="nationality">Národnost</label>
            <input type="text" id="nationality" name="nationality" class="@error('nationality') is-invalid @enderror block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ old('nationality')}}" />
            <x-input-error :messages="$errors->get('nationality')" class="mt-2" />

            <label for="yearOfBirth">Rok narození</label>
            <input type="number" id="yearOfBirth" name="yearOfBirth" class="@error('yearOfBirth') is-invalid @enderror block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" value="{{ old('yearOfBirth')}}" />
            <x-input-error :messages="$errors->get('yearOfBirth')" class="mt-2" />
            <x-primary-button class="mt-4">Odeslat</x-primary-button>
        </form>

    </div>

</x-app-layout>