<?php

namespace App\Http\Controllers;

use App\Interfaces\TaskRepositoryInterface;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        // $tasks = Task::all()->toArray();

        // return $tasks;

        $tasks = $this->taskRepository->getAllTasks();

        return $tasks;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $taskDetails = [
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date
        ];

        $taskDetails['title'] = ucwords($taskDetails['title']);
        $taskDetails['board_no'] = $request->board_no;
        $taskDetails['order_num'] = $this->get_order_num($request->board_no);

        $task = $this->taskRepository->createTask($taskDetails);

        return new TaskResource($task);
    } 

    private function get_order_num($board_num)
    {
        $task = Task::where('board_no', $board_num)->orderBy('order_num', 'DESC')->first();
        
        if(empty($task->order_num)){
            return 1;
        }else{
            $order_num = $task->order_num;
            $order_num += 1;
            return $order_num;
        }
    }

    public function show(Task $task)
    {
        //return new TaskResource($task);

        $taskId = $task->id;

        $task = $this->taskRepository->getTaskById($taskId);

        if (empty($task)) {
            return back();
        }

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
        $formFields['board_no'] = $request->board_no ?? 0;
        $formFields['order_num'] = $this->get_order_num($request->board_no);

        $task->update($formFields);

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $taskId = $task->id;

        //$task->delete();
        $this->taskRepository->deleteTask($taskId);

        return response()->noContent();
    }
}
