<x-app-layout>
    @if(session('success'))
    <div class="">{{session('success')}}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Název
                    <a href="{{route('cds.index', ['sort' => 'name', 'sortDir' => 'asc'])}}">^</a>
                    <a href="{{route('cds.index', ['sort' => 'name', 'sortDir' => 'desc'])}}">v</a>
                </th>
                <th>
                    Rok
                    <a href="{{route('cds.index', ['sort' => 'year', 'sortDir' => 'asc'])}}">^</a>
                    <a href="{{route('cds.index', ['sort' => 'year', 'sortDir' => 'desc'])}}">v</a>
                </th>
                <th>
                    Žánr
                    <a href="{{route('cds.index', ['sort' => 'genre_id', 'sortDir' => 'asc'])}}">^</a>
                    <a href="{{route('cds.index', ['sort' => 'genre_id', 'sortDir' => 'desc'])}}">v</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($cds as $Cd)
            <tr>
                <td><a href="{{route('cds.show', $Cd)}}">{{$Cd->name}}</a></td>
                <td>{{$Cd->year}}</td>
                <td><a href="{{route('genres.show', $Cd->genre)}}">{{$Cd->genre->name}}</a></td>
                <td>
                    <a href="{{route('cds.edit', $Cd)}}">Edit</a>
                    <form method="post" action="{{route('cds.destroy', $Cd)}}" onsubmit="return confirm('Opravdu chcete smazat?')">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('cds.create')}}">Přidat nový cd</a>
</x-app-layout>