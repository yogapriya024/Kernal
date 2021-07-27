
@extends('main')
@section('title','| About')
@section('content')
<div class="row">
<div class="col-md-12">
<h1><u>List To Do!</u></h1>
<hr>
<div class="row">
        <div class="col-md-8">
        @foreach($tasks as $task)
        <div class="post">
        <h3>User Name :{{$task->user->name}} </h1>
        <h3>Email : {{$task->user->email}} </h3>
        <h3>List : {{$task->description}}</h3>
      
        
             </div>
             <hr>
             </div>
             <div class="col-md-3 col-md-offset-1">
     
       
        </div>
             @endforeach
    </div>

</div>
</div>
@endsection
