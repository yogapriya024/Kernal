@extends('main')
@section('title','| $stub->title')
@section('content')
<div class="row">
<div class="col-md-8  col-md-offset-2">
<h1>{{$stub->title}}</h1>
<p>{{$stub->body}}</p>


</div>
</div>
@endsection