<?php

namespace App\Http\Resources\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Task
 *
 */
class TaskResource extends JsonResource
{
    public static $wrap = null;


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $status = [];
        if ($this->status) {
            $status['status'] = $this->status->label();
        }

        return array_merge(
            [
                'id' => $this->getKey(),
                'name' => $this->name,
                'description' => $this->description,
                'author' => $this->user->name,
                'publishedDate' => $this->updated_at->format('d-m-Y H:i')
            ],
            $status
        );
    }
}

