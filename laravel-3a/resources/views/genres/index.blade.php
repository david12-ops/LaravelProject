<x-app-layout>
    @if(session('success'))
    <div class="" style="color: #006400;">{{session('success')}}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Jméno
                    <a href="{{route('genres.index', ['sort' => 'name', 'sortDir' => 'asc'])}}">^</a>
                    <a href="{{route('genres.index', ['sort' => 'name', 'sortDir' => 'desc'])}}">v</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $genre)
            <tr>
                <td><a href="{{route('genres.show', $genre)}}">{{$genre->name}}</a></td>
                <td>
                    <a href="{{route('genres.edit', $genre)}}">Edit</a>
                    <form method="post" action="{{route('genres.destroy', $genre)}}" onsubmit="return confirm('Opravdu chcete smazat?')">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('genres.create')}}">Přidat nový žánr</a>
</x-app-layout>