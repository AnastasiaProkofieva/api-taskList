<?php

namespace App\Repositories;

use App\Enums\Task\TaskStatusEnum;
use App\Http\DTO\UserData;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{

    public function create(UserData $userData): Model|User
    {
        return User::query()->create($userData->toArray());
    }

    public function getByEmail(string $email): Model|User
    {
        return User::query()->where('email', $email)->first();
    }

    public function getAuthors(): Collection|array
    {
        return User::query()
            ->whereHas('tasks', function ($query){
                $query->where('status', TaskStatusEnum::COMPLETED->value);
            })
            ->get();
    }
}
