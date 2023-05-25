<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function task()
    {
        return view ('task.createTask');
    }
    public function taskCreate(Request $request)
    {
        // dd($request);
        $input = ([
            'task_name'=>$request->task_name,
            'content'=>$request->content,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status,
            'priority'=>$request->priority,
        ]);
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->tasks()->create($input);

        session()->flash('message','Task has been created Successfully'); 

        return view ('task.createTask');
    }
    public function allTask()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        // $tasksData = $user->tasks()->get();
        $tasksData = $user->tasks()->paginate(5);

        // dd($tasksData);
        return view ('task.allTask',compact('tasksData'));
    }
    public function taskEdit($id)
    {
        // dd($id);
        $taskData=Task::find($id);
        // dd($taskData);

        return view ('task.editTask',compact('taskData'));
    }
    public function taskUpdate(Request $request,$id)
    {
        $taskData=Task::find($id);

        $taskData->task_name=$request->task_name;
        $taskData->content=$request->content;
        $taskData->start_date=$request->start_date;
        $taskData->end_date=$request->end_date;
        $taskData->status=$request->status;
        $taskData->priority=$request->priority;

        $taskData->save();

        session()->flash('message','Task has been updated'); 

        return redirect()->route ('task.all');
    }
    public function taskDestroy($id)
    {
        // dd($id);
        $taskData=Task::find($id);
        // dd($taskData);
        $taskData->delete();

        session()->flash('message','Task has been updated');

        return redirect()->route ('task.all');
    }
}