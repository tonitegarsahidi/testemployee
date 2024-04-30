<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeFormRequest extends FormRequest
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
            "nric4Digit"=> 'nullable|string',
            "name"=> 'nullable|string',
            "manpowerId"=> 'nullable|string',
            'designation' => 'nullable|string',
            'project' => 'nullable|string',
            'team' => 'nullable|string',
            'supervisor' => 'nullable|string',
            'joinDate' => 'nullable|date',
            'resignDate' => 'nullable|date',
        ];
    }
}
