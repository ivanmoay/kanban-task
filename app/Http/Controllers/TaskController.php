<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        //$tasks = Task::where('board_no', $board_no)->toArray();
        $tasks = Task::all()->toArray();

        return $tasks;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //TODO max length
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required'
        ]);   

        $formFields['title'] = ucwords($formFields['title']);
        $formFields['board_no'] = $request->board_no;

        $task = Task::create($formFields);
        return new TaskResource($task);
    } 

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required'
        ]);   

        $formFields['title'] = ucwords($formFields['title']);
        $formFields['status'] = $request->status ?? 0;

        $task->update($formFields);

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->noContent();
    }
}
