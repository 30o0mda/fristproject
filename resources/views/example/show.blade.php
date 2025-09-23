@extends('index')
@section('content')
<p>{{ 'id = '.$test->id }}</p>
<p>{{ 'name = '.$test->name }}</p>
<p>{{ 'content = '.$test->content }}</p>
<p>{{ 'created_at = '.$test->created_at }}</p>
<p>{{ 'updated_at = '.$test->updated_at }}</p>
<p>{{ 'deleted_at = '.$test->deleted_at }}</p>
@endsection

