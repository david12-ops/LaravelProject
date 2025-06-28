<x-app-layout>
    <div class="">
        <h2>Detail autora</h2>
        <div>Jméno: {{$author->name}}</div>
        <div>Národnost: {{$author->nationality}}</div>
        <div>Rok narození: {{$author->yearOfBirth}}</div>
        <div>Datum přidání/vytvoření: {{$author->created_at}}</div>
    </div>
    <a href="{{route('authors.index')}}">Zpět</a>
</x-app-layout>