<?php

namespace App\Repositories;

use App\Enums\Task\TaskStatusEnum;
use App\Http\DTO\TaskData;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class TaskRepository
{
    protected Model $model;

    public function __construct(
        Task $model
    )
    {
        $this->model = $model;
    }

    public function getAll(array $filters): LengthAwarePaginator
    {
        $query = $this->model->query();

        if (!empty($filters['status'])) {

            $query->where('status', TaskStatusEnum::getFromName($filters['status'])?->value);

        }
        if (!empty($filters['author'])) {
            $query->whereRelation('user', function ($query) use ($filters) {
                $query->where('name', 'like', '%' . $filters['author'] . '%');
            });
        }
        return $query->paginate($filters['limit']);;
    }

    public function create(TaskData $taskData): Model|Task
    {
        return Task::query()->create($taskData->toArray());
    }


    public function update(TaskData $taskData, Task $task): void
    {
        $task->update($taskData->toArray());
    }

    public function delete(Task $task): void
    {
        $task->delete();
    }


    public function getByUser(array $params, User $user): LengthAwarePaginator
    {
        return Task::query()
            ->where('user_id', $user->getKey())
            ->paginate($params['limit']);
    }

    public function complete(Task $task): JsonResponse
    {

        if ($task->status === TaskStatusEnum::COMPLETED) {
            return response()->json(['status' => 'Task was already completed'], 403);
        }

        $task->update(['status' => TaskStatusEnum::COMPLETED->value]);

        return response()->json(['status' => 'success']);
    }

}
