<x-app-layout>
    <div class="">
        <h2>Detail cd</h2>
        <div>Název: {{$Cd->name}}</div>
        <div>Rok: {{$Cd->year}}</div>
        <h2>Autoři</h2>
        <div><a href="{{route('authors.show', $Cd->author)}}">{{$Cd->author->name ?: '-'}}</a></div>
        <h2>Žánry</h2>
        @if ($Cd->genre)
        <div><a href="{{route('genres.show', $Cd->genre)}}">{{$Cd->genre->name}}</a></div>
        @else
        <div>-</div>
        @endif
        <div>Datum přidání/vytvoření: {{$Cd->created_at}}</div>
    </div>
    <a href="{{route('cds.index')}}">Zpět</a>
</x-app-layout>