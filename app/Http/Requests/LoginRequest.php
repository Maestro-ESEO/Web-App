<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
    
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            "email" => ["required", "email"],
            "password" => ["required", "min:". RegisterRequest::$minPasswordLength, "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/"],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array {
        return [
            "email.required" => "The email address is required.",
            "email.email" => "The email address is not valid.",
            "password.required" => "The password is required.",
            "password.min" => "The password must be at least " . RegisterRequest::$minPasswordLength . " characters long and contain at least one lowercase letter, one uppercase letter, and one digit.",
            "password.regex" => "The password must be at least " . RegisterRequest::$minPasswordLength . " characters long and contain at least one lowercase letter, one uppercase letter, and one digit.",
        ];
    }
}
