@extends('layouts.app')

@section("content")
<form class="max-w-sm mx-auto" action=" {{ isset($task) ? route('task.update', [$task->id]) : route('task.store') }} " method="post">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div class="mb-3" >
        <label for="title" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" >Title</label>
        <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" >Description</label>
        <textarea name="description" id="description" cols="5" class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{ $task->description ?? old('description') }}</textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="long_description" class="block mb-2 text-lg font-medium text-gray-900 dark:text-white" >Long Description</label>
        <textarea name="long_description"  class="block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="long_description" cols="50" rows="6" >{{ $task->long_description ?? old('long_description') }}</textarea>
        @error('long_description')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div class="ml-64" >
        <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"  >
            @isset($task)
                Edit 
            @else
              Add
            @endisset
        </button>
    </div>
    
</form>
@endsection