@include("form", ['task' => $task])<form action=" {{ isset($task) ? route('task.update', [$task->id]) : route('task.store') }} " method="post">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}" />
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="5" >{{ $task->description ?? old('description') }}</textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" cols="10" >{{ $task->long_description ?? old('long_description') }}</textarea>
        @error('long_description')
            <p>{{ $message }}</p>
        @enderror
    </div>
    
    <button type="submit">
        @isset($task)
            Edit
        @else
            Add
        @endisset
    </button>
</form>