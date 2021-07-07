<?php

namespace App\Http\Controllers;
use Auth;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Rules\TwoWords;

class TaskController extends Controller
{
    
    public function index()
    {
        if(Auth::user())
        {
            $tasks = Auth::user()->tasks;
            return view('welcome', ['tasks' => $tasks]);
        }
        return view('welcome');
    }

    

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', new TwoWords],
            'user_id' => 'required'
        ]);

        Task::create($validated);
        return redirect()->route('home')->with('msg', 'Task created Successully!');
    }

    
    
    public function edit(Task $task)
    {
        if (\Gate::allows('edit-task', $task)) {
            return view('task/edit', ['task' => $task]);
        }
        return redirect()->route('home')->with('msg', 'This is not your task');

    }

    //Update task
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => ['required', new TwoWords]
        ]);
        $task->update($validated);

        return redirect()->route('home')->with('msg', 'Task updated Successully!');
    }

    //Task deletion
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        //Checking if the task belongs to current user
        if (!\Gate::allows('edit-task', $task))
        {
            return redirect()->route('home')->with('msg', 'This is not your task');
        }
        $task->delete();
        return redirect()->route('home')->with('msg', 'Task deleted Successully!');
    }
}
