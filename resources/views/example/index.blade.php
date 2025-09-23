@extends('index')
@section('content')
<a href="{{ route('example.create') }}" class="create">create</a>
{{-- <a href="example" class="create">Without trashed</a> --}}
<a href="{{ route('example.index') }}" class="create">Without trashed</a>
<a href="{{ route('example.index', ['trashed' => 'yes']) }}" class="create">With  trashed</a>
<table width="100%">
    <thead>
        <tr>
            <th>name</th>
            <th>status</th>
            <th>show</th>
            <th>content</th>
            <th>created_at</th>
            <th>updated_at</th>
            <th>deleted_at</th>
            {{-- <th>my_soft_delete</th> --}}
            <th>action</th>
        </tr>
    </thead>
    <tbody>
       @each('example.data',$test ,'data','example.empty_data')
    </tbody>
</table>

@endsection
