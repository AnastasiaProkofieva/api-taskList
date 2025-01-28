<?php

namespace App\Http\Requests\Task;

use App\Http\Requests\Common\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'userId' => 'required|int'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'userId' => auth()->id(),
        ]);
    }
}
