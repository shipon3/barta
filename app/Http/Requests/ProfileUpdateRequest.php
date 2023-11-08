<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends FormRequest
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
        $auth = Auth::user();
        return [
            'first_name' => 'required|max:100',
            'last_name' => 'nullable',
            'email' => 'required|unique:users,email,' . $auth->id,
            'bio' => 'nullable',
        ];
    }
}
