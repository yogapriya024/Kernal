@extends('main')
@section('title','| Homepage')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="style.css">
@endsection
  
@section('content')
    
    <div class="row">
    <div class="col-md-12">
    <div class="jumbotron">
  <h1>welcome To My Blog!</h1>
  <p class="lead">Thank you so much for visiting. This is my test website built with laravel. Please read my popular post!.</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
</div>
    
    </div>
    
    </div>
    
    <div class="row">
        <div class="col-md-8">
        @foreach($stubs as $stub)
        <div class="post">
        <h3>{{$stub->title}}</h3>
        <p>{{substr($stub->body,0,50)}}{{strlen($stub->body)>50 ? "...":""}}</p>
        <a href="{{route('blob.single',$stub->slug)}}" class="btn btn-primary">Read More</a>
        
             </div>
             <hr>
             @endforeach
             </div>
           
        <div class="col-md-3 col-md-offset-1">
       <h2>Sidebar</h2>
        </div>
    </div>


  @stop
 