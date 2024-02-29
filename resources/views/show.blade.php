@extends('layouts.app')

@section('content')

<p>
    @if (session()->has('success'))
        <p>
            {{session('success')}}
        </p>
    @endif
</p>

<div>
    <div class="mb-4" >
        <label for="name" class="text-lg text-black font-bold mb-1" >Title</label>
        <p class="text-grey" >
            {{$task->title}}
        </p>
    </div>
    <div class="mb-4" >
        <label class="text-lg text-black font-bold mb-1" for="name">Descrption</label>
        <p class="text-grey">
            {{$task->description}}
        </p>
    </div>
    <div class="mb-4" >
        <label class="text-lg text-black font-bold mb-1" for="name">Long Descrption</label>
        <p class="text-grey">
            {{$task->long_description}}
        </p>
    </div>
    <div class="flex justify-end" >
        <a onclick="window.location='{{ route('task.edit', [$task ->id]) }}'" class="bg-blue-500 w-24 m-2 text-white btn"  class="edit cursor-pointer" data-toggle="modal">Edit</a>
        <form action="{{ route("task.destroy", ['task' => $task->id]) }}" method="post" class="bg-red-600 m-2 w-24 text-white btn" >
            @csrf
            @method('DELETE')
            <button type="submit">
                Delete
            </button>
        </form>
    </div>
</div>

<h1>
    

<div>
   
</div>

@endsection