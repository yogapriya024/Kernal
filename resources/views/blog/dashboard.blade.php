<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Blog') }}
    </h2>
   
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <div class="flex">
                <div class="flex-auto text-2xl mb-4"> Blog</div>
                
                <div class="flex-auto text-right mt-2">
                    <a href="/stub" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add new Blog</a>
                </div>
            </div>
            <div class="row">
<div class="col-md-12">
<table class="table">

<thead>
<th>#</th>
<th>Title</th>
<th>Body</th>
<th>Created At</th>
<th></th>
</thead>
<tbody>
                


              
                @foreach(auth()->user()->stubs as $stub)










                <tr>
<th>{{$stub->id}} </th>
<td>{{$stub->title}}</td>
<td>{{substr($stub->body,0,50)}}{{strlen($stub->body)>50 ? "...":""}}</td>
<td>{{date('M j,Y',strtotime($stub->created_at))}}</td>
<td class="p-3 px-5">
                            
                            <a href="/stub/{{$stub->id}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                            <form action="/stub/{{$stub->id}}" class="inline-block">
                                <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
</div>
</div>
</div>
</x-app-layout>