<?php

namespace App\Enums\Task;

enum TaskStatusEnum: int
{
    case COMPLETED = 1;
    case NOTCOMPLETED = 2;

    public function label(): string
    {
        return match($this) {
            self::COMPLETED => 'Completed',
            self::NOTCOMPLETED => 'Not Completed',
        };
    }
    public static function getFromName(string $name): self
    {
        return match($name) {
            'Completed' => self::COMPLETED,
            'Not Completed' => self::NOTCOMPLETED,
        };
    }
}
