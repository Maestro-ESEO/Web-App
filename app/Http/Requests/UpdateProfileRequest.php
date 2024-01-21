<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest {

    public static $minPasswordLength = 8;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:'.self::$minPasswordLength, 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'password_confirm' => ['required', 'same:password'],
            'image_url' => ['required', 'url', 'max:500'],
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
            "image_url.required" => "The image URL is required.",
            "image_url.url" => "The image URL is invalid.",
            "image_url.max" => "The image URL must be at most 255 characters long.",
        ];
    }
}
