<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Allow all authenticated users
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'class' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ];
    }
}
