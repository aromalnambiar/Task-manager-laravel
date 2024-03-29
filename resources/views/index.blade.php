@extends('layouts.app')
@section('content') 
@if(session()->has('flash_notification.message'))
    <div class="alert alert-{{ session('flash_notification.level') }}">
        {!! session('flash_notification.message') !!}
    </div>
@endif

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th style="width: 300px;">Name</th>
            <th>Description</th>
            <th style="width: 140px" >Actions</th>
        </tr>
    </thead>
    <tbody>

        @forelse ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ Str::limit($task->description, 100, '...') }}</td>
            <td>
                <a onclick="window.location='{{ route('task.show', [$task ->id]) }}'"  class="view cursor-pointer" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#xE417;</i></a>
                <a onclick="window.location='{{ route('task.edit', [$task ->id]) }}'"  class="edit cursor-pointer" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                <form action="{{ route("task.destroy", ['task' => $task->id]) }}" method="post" class="contents" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete cursor-pointer red " data-toggle="modal"><i class="material-icons font text-red-600" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <p>No tasks found</p>
        </tr>
        @endforelse
       
    </tbody>
</table>
<div class="clearfix">
    @if ($tasks->count())
        {{$tasks->links()}}
    @endif
</div>

@endsection