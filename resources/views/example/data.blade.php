<?php
use App\Models\Example;
use Illuminate\Support\Facades\Storage;
?>
<tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td><a href={{ storage::url($data->photo) }}> <img src="{{ storage::url($data->photo) }}" style="width: 48px;height:48px"></a></td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->show==1?'show':'hide' }}</td>
                <td>{{ $data->content }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->updated_at }}</td>
                <td>{{ $data->deleted_at }}</td>
                {{-- <td>{{ $data->my_soft_delete }}</td> --}}
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
