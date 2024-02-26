<p>
    @if (session()->has('success'))
        <p>
            {{session('success')}}
        </p>
    @endif
</p>
<h1>
    {{$task->title}}
</h1>
<p>
    {{$task->description}}
</p>

<div>
    <form action="{{ route("task.destroy", ['task' => $task->id]) }}" method="post">
    @csrf
    @method(<p>
    @if (session()->has('success'))
        <p>
            {{session('success')}}
        </p>
    @endif
</p>
<h1>
    {{$task->title}}
</h1>
<p>
    {{$task->description}}
</p>

<div>
    <form action="{{ route("task.destroy", ['task' => $task->id]) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">
        DELETE
    </button>
    </form>
</div>