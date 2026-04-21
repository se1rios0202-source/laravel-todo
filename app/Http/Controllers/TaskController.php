<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    private $task;
    public function __construct(Task $task){
        $this->task = $task;
    }
    //
    public function index(){
        $all_tasks = $this->task->all();
        return view('todo.index')->with('all_tasks', $all_tasks);
    }

    public function store(Request $request){
        $this->task->name = $request->name;
        $this->task->save();

        return back();
    }
    public function edit($id){
        $task = $this->task->find($id);
        return view('todo.edit')->with('task',$task);
    }
    public function update($id,Request $request){
        $task = $this->task->find($id);
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    }
    public function destroy($id){
        $task = $this->task->destroy($id);
        return back();
    }
}
