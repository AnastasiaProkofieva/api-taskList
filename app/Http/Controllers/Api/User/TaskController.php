<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\DTO\TaskData;
use App\Http\Requests\Common\BaseGetRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\TaskIdRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use App\Models\User;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function __construct(
        private TaskService $service
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function list(BaseGetRequest $request): AnonymousResourceCollection
    {
        /* @var User $user */
        $user = auth()->user();
        return TaskResource::collection(
            $this->service->getByUser(
                $request->validated(),
                $user
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(StoreTaskRequest $request): TaskResource
    {
        $taskData = new TaskData(...$request->validated());
        return TaskResource::make(
            $this->service->create($taskData)
        );
    }

    /**
     * Display the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function edit(Task $task, UpdateTaskRequest $request): JsonResponse
    {
        Gate::authorize('update', $task);
        $taskData = new TaskData(...$request->validated());
        return $this->service->update($taskData, $task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Task $task): JsonResponse
    {
        Gate::authorize('delete', $task);
        return $this->service->delete($task);
    }

    public function complete(Task $task): JsonResponse
    {

        Gate::authorize('complete', $task);
        return $this->service->complete($task);
    }
}
