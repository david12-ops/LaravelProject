<x-app-layout>
    <div class="">
        <h2>Detail cd {{$Cd->name}}</h2>
        <div>Rok: {{$Cd->year}}</div>
        <div>Obal: {{$Cd->cover}}</div>

        <h2>Seznam autorů</h2>
        <ul>
            @foreach($Cd->author as $author)
            <li>{{$employee->surname}}, {{$employee->name}}</li>
            @endforeach
        </ul>
        <h2>Seznam žánrů</h2>
        <ul>
            @foreach($Cd->genre as $genre)
            <li>{{$genre->name}}</li>
            @endforeach
        </ul>
    </div>
    <a href="{{route('cds.index')}}">Zpět</a>
</x-app-layout>