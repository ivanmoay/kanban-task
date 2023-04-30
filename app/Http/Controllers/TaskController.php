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
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $formFields = $request->validate([
        //     'brand' => ['required', Rule::unique('brands', 'brand')]
        // ]);        

        // $formFields['brand'] = ucwords($formFields['brand']);
        // Brand::create($formFields);

        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            // 'status' => 'required',
            // 'board_no' => 'required',
            // 'order_num' => 'required'
        ]);   

        $formFields['status'] = 1;
        $formFields['board_no'] = 1;
        $formFields['order_num'] = 1;

        $task = Task::create($formFields);

        return new TaskResource($task);

        // $task = Task::create($request->validated());
        // return new TaskResource($task);
    } 

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        //
    }

    public function destroy(Task $task)
    {
        //
    }
}
