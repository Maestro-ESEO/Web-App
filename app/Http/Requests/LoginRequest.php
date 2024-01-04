<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            "email" => ["required", "email"],
            "password" => ["required", "min:8", "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/"],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            "email.required" => "L'adresse email est requise.",
            "email.email" => "L'adresse email n'est pas valide.",
            "password.required" => "Le mot de passe est requis.",
            "password.min" => "Le mot de passe doit contenir au moins :min caractères.",
            "password.regex" => "Le mot de passe doit contenir au moins une lettre minuscule, une lettre majuscule et un chiffre.",
        ];
    }
}
