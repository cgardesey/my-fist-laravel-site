<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function update(Task $task)
    {
//        if (request()->has('completed')){
//            $task->complete();
//        } else {
//            $task->incomplete();
//        }

//        request()->has('completed') ? $task->complete();

        $method = request()->has('completed') ? 'complete' : 'incomplete';

        $task->$method();

        return back();
    }

    public function store(Project $project)
    {
//        Task::create([
//            'project_id' => $project->id,
//            'description' => request('description')
//        ]);

        $attributes = request()->validate(['description' => 'required']);
        $project->addTask($attributes);

        return back();
    }
}
