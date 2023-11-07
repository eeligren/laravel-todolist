<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{   
    //Fetch all tasks in right order and send back to index
    public function index() {
        $tasks = Task::orderBy('completed_at', 'ASC')
        ->orderBy('id', 'DESC')
        ->get();
        
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    //New task creation view
    public function create() {
        return view('tasks.create');
    }

    //Create new task
    public function store() {
        request()->validate([
            'description' => ['required', 'max:255'],
        ]);

        //Creates task to database
        Task::create([
            'description' => request('description'),
        ]);

        //Redirects back to home
        return redirect('/');
    }   

    //Update "Mark done"
    public function update($id) {
        //Updates database table Task
        $task = Task::where('id', $id)->first();

        //Set rows completed_at column value to now() time
        $task->completed_at = now();

        //Save db
        $task->save();

        //Redirects back to home
        return redirect('/');
    }

    //Task delete
    public function delete($id) {
        //Delete query
        $task = Task::where('id', $id)->delete();

        //Redirect back to home
        return redirect('/');
    }
}
