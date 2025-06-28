<x-app-layout>
    <div class="">
        <h2>Detail žánru</h2>
        <div>Název: {{$genre->name}}</div>
        <div>Popis: {{$genre->description ? : '-'}}</div>
        <div>Datum přidání/vytvoření: {{$genre->created_at}}</div>
    </div>
    <a href="{{route('genres.index')}}">Zpět</a>
</x-app-layout>