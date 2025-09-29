@extends('index')
@section('content')
<p>{{ 'id = '.$test->id }}</p>
<p>{{ 'name = '.$test->name }}</p>
<p><a href={{ storage::url($test->photo) }}> <img src="{{ storage::url($test->photo) }}" style="width: 48px;height:48px"></a></p>
<p>{{ 'show = '.$test->show }}</p>
<p>{{ 'status = '.$test->status }}</p>
<p>{{ 'content = '.$test->content }}</p>
<p>{{ 'created_at = '.$test->created_at }}</p>
<p>{{ 'updated_at = '.$test->updated_at }}</p>
<p>{{ 'deleted_at = '.$test->deleted_at }}</p>
@endsection

