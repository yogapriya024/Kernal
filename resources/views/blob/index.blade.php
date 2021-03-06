@extends('main')
@section('title','|Blog')
@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">
<h1>Blog</h1>
</div>
</div>
@foreach($stubs as $stub)
<div class="row">
<div class="col-md-8 col-md-offset-2">
<h2>{{$stub->title}}</h2>
<h5>Published:{{date('M j,Y',strtotime($stub->created_at))}} </h5>
<p>{{substr($stub->body,0,250)}}{{strlen($stub->body)>250 ? '...' : ""}}</p>

<a href="{{route('blob.single',$stub->slug)}}" class="btn btn-primary">Read More</a>
<hr>
</div>
</div>
@endforeach
<div class="row">
<div class="col-md-12">
<div class="text-center">
{!!$stubs->links()!!}
</div>
</div>
</div>
@endsection