<a href="{{ route('example.create') }}" class="create">create</a>
<a href="example" class="create">Without trashed</a>
<a href="example?trashed=yes" class="create">With  trashed</a>
<table>
    <thead>
        <tr>
            <th>name</th>
            <th>content</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($test as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->content }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->updated_at }}</td>
                <td>{{ $data->deleted_at }}</td>
                <td>
                    <a href="{{ route('example.edit', ['example' => $data->id]) }}">edit</a>
                    <a href="{{ route('example.show', ['example' => $data->id]) }}">show</a>
                    <form action="{{ route('example.destroy', ['example' => $data->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                    <form action="{{ route('example.restore', ['example' => $data->id]) }}" method="POST">
                        @csrf
                        <input type="submit" value="Restore">
                    </form>
                    <form action="{{ route('example.forcedelete', ['example' => $data->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Force Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
