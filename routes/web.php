<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;

// root 
Route::get('/', function () {
    return redirect()->route('task.index');
});

// index page
Route::get('/task', function ()  {
    return view('index', ['tasks' => Task::latest()->paginate(5)]);
})->name('task.index');

// create page
Route::view('/task/create', 'create')
      ->name('task.create');

// show page
Route::get('/task/{task}', function (Task $task)  {
    return view('show', ['task' => $task]);
})->name('task.show');
    
// show page
Route::delete('/task/{task}', fun<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;

// root 
Route::get('/', function () {
    return redirect()->route('task.index');
});

// index page
Route::get('/task', function ()  {
    return view('index', ['tasks' => Task::latest()->paginate(5)]);
})->name('task.index');

// create page
Route::view('/task/create', 'create')
      ->name('task.create');

// show page
Route::get('/task/{task}', function (Task $task)  {
    return view('show', ['task' => $task]);
})->name('task.show');
    
// show page
Route::delete('/task/{task}', function (Task $task)  {

    $task->delete();

    return redirect()->route("task.index")
    ->with("success","Successfully deleted !");

})->name('task.destroy');

// show page
Route::get('/task/{task}/edit', function (Task $task)  {
    return view('edit', ['task' =>  $task]);
})->name('task.edit');


    
// submit form
Route::post('/task', function(Request $request) {
  
    $data = $request->validate([
        'title' => 'required|max:225',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description']; 
    $task->save();

    return redirect()->route('task.show', [$task->id])
            ->with('success','Successfully submitted !');

})->name('task.store');


// edit form
Route::put('/task/{task}', function(Task $task ,Request $request) {
  
    $data = $request->validate([
        'title' => 'required|max:225',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description']; 
    $task->save();

    return redirect()->route('task.show', $task)
            ->with('success','Successfully updated !');

})->name('task.update');


// fallback page
Route::fallback( function ()  {
    return("This page not exist") ;
});
    