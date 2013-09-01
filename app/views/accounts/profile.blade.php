@extends('layouts.default')

@section('title')
{{Auth::user()->username}}
@stop

@section('content')

<div id="content">
    <h1>{{Auth::user()->username}}</h1>

</div>

@stop