@extends('index')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
    @endif
    <form action="{{ route('example.store') }}" method="POST">
        @csrf
        <input type="text" placeholder="name" name="name" value="{{ old('name') }}">
       <hr />
        <label for="show">Show Data</label>
        <input type="radio" name="show" value="1"  id="show">
        <hr />
        <label for="show">Hide Data</label>
        <input type="radio" name="show" value="0"  id="hide">
        <hr />
        <label for="status">status</label>
        <select name="status">
            <option  value="enabled">Enable</option>
            <option  value="disabled">Disable</option>

        </select>
        <hr />
        <textarea name="content" placeholder="content">{{ old('content') }}</textarea>
        <input type="submit" value="create">
    </form>

    @push('css')
        <style>
            h1 {
                color: rgb(9, 52, 206);
            }
        </style>
        <h4> I am h4</h4>
    @endpush

    {{-- @push('js')
        <script>
            alert('You are Created A New Record Now');
        </script>
    @endpush --}}
@endsection
