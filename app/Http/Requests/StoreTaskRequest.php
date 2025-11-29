<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeTaskRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
            'due_date' => 'nullable|date'
        ];
    }
    
    /**
     * Custom error messages (optional)
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Tên công việc là bắt buộc',
            'title.max' => 'Tên công việc không được quá 255 ký tự',
            'status.required' => 'Trạng thái là bắt buộc',
            'due_date.date' => 'Hạn chót phải là ngày hợp lệ'
        ];
    }
}
