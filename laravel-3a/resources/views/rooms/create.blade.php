<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('rooms.store') }}">
            @csrf
            <label for="name">Název</label>
            <input type="text"
                   id="name" name="name"
                   class="@error('name') is-invalid @enderror block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                   value="{{ old('name')}}"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <label for="no">Číslo</label>
            <input type="text"
                   id="no" name="no"
                   class="@error('no') is-invalid @enderror block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                   value="{{ old('no')}}"/>
            <x-input-error :messages="$errors->get('no')" class="mt-2" />

            <label for="phone">Telefon</label>
            <input type="text"
                   id="phone" name="phone"
                   class="@error('phone') is-invalid @enderror block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                   value="{{ old('phone')}}"/>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />


            <x-primary-button class="mt-4">Odeslat</x-primary-button>
        </form>

    </div>

</x-app-layout>
