<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {

    public static $minPasswordLength = 8;

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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:'.self::$minPasswordLength, 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'password_confirm' => ['required', 'same:password'],
        ];
    }

    public function messages(): array {
        return [
            "first_name.required" => "The first name is required.",
            "first_name.string" => "The first name is invalid.",
            "last_name.required" => "The last name is required.",
            "last_name.string" => "The last name is invalid.",
            "email.required" => "The email is required.",
            "email.email" => "The email is invalid.",
            "password.required" => "The password is required.",
            "password.min" => "The password must be at least ". self::$minPasswordLength ." characters long and contain at least one lowercase letter, one uppercase letter, and one digit.",
            "password.regex" => "The password must be at least ". self::$minPasswordLength ." characters long and contain at least one lowercase letter, one uppercase letter, and one digit.",
            "password_confirm.required" => "The password confirmation is required.",
            "password_confirm.same" => "The password and password confirmation do not match.",
        ];
    }
}
