<x-app-layout>
    @if(session('success'))
    <div class="" style="color: #006400;">{{session('success')}}</div>
    @endif
    @if(session('error'))
    <div class="" style="color: Red">{{session('error')}}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Jméno
                    <a href="{{route('authors.index', ['sort' => 'name', 'sortDir' => 'asc'])}}">^</a>
                    <a href="{{route('authors.index', ['sort' => 'name', 'sortDir' => 'desc'])}}">v</a>
                </th>
                <th>
                    Rok narození
                    <a href="{{route('authors.index', ['sort' => 'yearOfBirth', 'sortDir' => 'asc'])}}">^</a>
                    <a href="{{route('authors.index', ['sort' => 'yearOfBirth', 'sortDir' => 'desc'])}}">v</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
            <tr>
                <td><a href="{{route('authors.show', $author)}}">{{$author->name}}</a></td>
                <td>{{$author->yearOfBirth}}</td>
                <td>
                    <a href="{{route('authors.edit', $author)}}">Edit</a>
                    <form method="post" action="{{route('authors.destroy', $author)}}" onsubmit="return confirm('Opravdu chcete smazat?')">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('authors.create')}}">Přidat autora</a>
</x-app-layout>