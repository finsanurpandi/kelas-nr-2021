<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\DepartmentValue;
use Illuminate\Validation\Rule;

class UpdateLecturerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nidn' => ['required', 'digits:10', Rule::unique('lecturers', 'nidn')->ignore($this->nidn, 'nidn')],
            'name' => 'required|string|min:3|max:60',
            'department_id' => [new DepartmentValue],
        ];
    }
}
