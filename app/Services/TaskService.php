<?php

namespace App\Services;

use App\Enums\Task\TaskStatusEnum;
use App\Http\DTO\TaskData;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TaskService
{
    public function __construct(
        private readonly TaskRepository $repository,

    )
    {
    }

    public function getAll(array $filters): ResourceCollection
    {
        $tasks = $this->repository->getAll($filters);
        return TaskResource::collection($tasks);
    }

    public function create(TaskData $taskData): Task|Model
    {
        return $this->repository->create($taskData);
    }

    public function update(TaskData $taskData, Task $task): JsonResponse
    {
        $this->repository->update($taskData, $task);
        return response()->json();
    }

    public function delete(Task $task): JsonResponse
    {
        $this->repository->delete($task);
        return response()->json();
    }

    public function getByUser(array $params, User $user): ResourceCollection
    {
        $tasks = $this->repository->getByUser($params, $user);
        return TaskResource::collection($tasks);
    }

    public function complete(Task $task): JsonResponse
    {
        return $this->repository->complete($task);
    }
}
