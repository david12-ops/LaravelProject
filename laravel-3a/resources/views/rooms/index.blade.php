<x-app-layout>
    @if(session('success'))
    <div class="" style="color: #006400;">{{session('success')}}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Název
                    <a href="{{route('rooms.index', ['sort' => 'name', 'sortDir' => 'asc'])}}">^</a>
                    <a href="{{route('rooms.index', ['sort' => 'name', 'sortDir' => 'desc'])}}">v</a>
                </th>
                <th>
                    Číslo
                    <a href="{{route('rooms.index', ['sort' => 'no', 'sortDir' => 'asc'])}}">^</a>
                    <a href="{{route('rooms.index', ['sort' => 'no', 'sortDir' => 'desc'])}}">v</a>
                </th>
                <th>
                    Tel.
                    <a href="{{route('rooms.index', ['sort' => 'phone', 'sortDir' => 'asc'])}}">^</a>
                    <a href="{{route('rooms.index', ['sort' => 'phone', 'sortDir' => 'desc'])}}">v</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
            <tr>
                <td><a href="{{route('rooms.show', $room)}}">{{$room->name}}</a></td>
                <td>{{$room->no}}</td>
                <td>{{$room->phone}}</td>
                <td>
                    <a href="{{route('rooms.edit', $room)}}">Edit</a>
                    <form method="post" action="{{route('rooms.destroy', $room)}}" onsubmit="return confirm('Opravdu chcete smazat?')">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('rooms.create')}}">Založit novou</a>
</x-app-layout>