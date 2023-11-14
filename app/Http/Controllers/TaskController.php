<?php

namespace App\Http\Controllers;

use App\Http\Resources\InfoResource;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskController extends Controller
{
    const MESSAGE_CARD_DELETE = 'Карточка успешно удалена';
    const MESSAGE_ERROR_USER_NOT_FOUND = 'Нет пользователя с таким id';

    public function statuses()
    {
        return new JsonResource(Task::STATUSES);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return TaskResource::collection($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::find($request['author_id']);

        if (!$user) {
            return new InfoResource([
                'message' => self::MESSAGE_ERROR_USER_NOT_FOUND, // Можно сделать через исключение и перехватить в общем хэндлере
            ]);
        }

        $task = Task::firstOrCreate([
            'name' => $request['name'],
            'description' => $request['description'] ?? null,
            'author_id' => $user->id,
            'status' => $request['status'] ?? Task::STATUSES[0],
            'is_open' => $request['is_open'] ?? true,
        ]);

        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function get(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Task $task)
    {
        $task->delete();

        return new InfoResource([
            'message' => self::MESSAGE_CARD_DELETE,
        ]);
    }
}
