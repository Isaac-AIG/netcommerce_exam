<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Enums\TaskStatus;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Exception;

class TaskController extends Controller
{
    public function create(StoreTaskRequest $request): JsonResponse
    {
        try {
            $task = Task::create([
                'company_id' => $request->company_id,
                'task' => $request->task,
                'description' => $request->description,
                'user_id' => $request->user_id,
                'status' => StatusEnum::PENDING->value,
                'start_at' => now(),
                'due_date' => now()->addDays(30),
            ]);

            $task->load([
                'company',
                'user',
            ]);
            if (!$task->user || !$task->company) {
            throw new \Exception('Related records not found');
        }
            return response()->json([
                'id' => $task->id,
                'name' => $task->name,
                'description' => $task->description,
                'user' => $task->user->name,
                'company' => [
                    'id' => $task->company->id,
                    'name' => $task->company->name,
                ],
            ], 201);

        }catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to create task',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
