<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all authenticated users
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($this->student),
            ],
            'class' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ];
    }
}
