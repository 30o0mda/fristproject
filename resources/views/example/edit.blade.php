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
<form action="{{ route('example.update', ['example' => $test->id]) }}" method="POST">
    @csrf
    @method('put')
       <input type="text" placeholder="name" name="name" value="{{ $test->name }}">

 <hr />
        <label for="show">Show Data</label>
        <input type="radio" name="show" value="1" @selected($test->show == 1) id="show">
        <hr />
        <label for="show">Hide Data</label>
        <input type="radio" name="show" value="0" @selected($test->show == 0) id="hide">
        <hr />
        <label for="status">status</label>
        <select name="status">
            <option @selected($test->status == 'enabled') value="enabled">Enable</option>
            <option  @selected($test->status == 'disabled') value="disabled">Disable</option>

        </select>
        <hr />
    <textarea name="content" placeholder="content">{{$test->content}}</textarea>
    <input type="submit" value="update">
</form>

@endsection
