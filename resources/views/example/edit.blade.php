<?php
use App\Models\Example;
use App\Models\Test;
use Illuminate\Support\Facades\Storage;
?>
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
{{-- @dd($test->show) --}}
<form action="{{ route('example.update', ['example' => $test->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
       <input type="text" placeholder="name" name="name" value="{{ $test->name }}">

 <hr />
        <label for="show">Show Data</label>
        <input type="radio" name="show" value="1" {{ $test->show == 1 ? 'checked' : '' }} id="show">
        <hr />
        photo
        <input type="file" name="photo"/>
        <a href={{ Storage::url($test->photo) }}> <img src="{{ Storage::url($test->photo) }}" style="width: 48px;height:48px">
        </a>
        <hr />
        <label for="show">Hide Data</label>
        <input type="radio" name="show" value="0" {{ $test->show == 0 ? 'checked' : '' }} id="hide">
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
