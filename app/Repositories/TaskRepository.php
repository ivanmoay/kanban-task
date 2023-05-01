<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAllTasks()
    {
        return Task::all()->sortBy('order_num');
    }
    public function getTaskById($taskId)
    {
        return Task::findOrFail($taskId);
    }
    public function deleteTask($taskId)
    {
        Task::destroy($taskId);
    }
    public function createTask(array $taskDetails)
    {
        return Task::create($taskDetails);
    }
    public function updateTask($task, array $newDetails)
    {
        //return Task::whereId($taskId)->update($newDetails);
        return $task->update($newDetails);
    }
    
}