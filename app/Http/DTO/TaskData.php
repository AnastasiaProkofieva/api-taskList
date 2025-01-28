<?php

namespace App\Http\DTO;

readonly class TaskData extends BaseDto
{
    public function __construct(
        public string $name,
        public string $description,
        public int $userId,
        public int|null $id = null
    ) {
    }
}
