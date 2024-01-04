<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'password_confirm' => ['required', 'same:password'],
        ];
    }

    public function messages(): array
    {
        return [
            "first_name.required" => "Le prénom est requis.",
            "first_name.string" => "Le prénom n'est pas valide.",
            "last_name.required" => "Le nom est requis.",
            "last_name.string" => "Le nom n'est pas valide.",
            "email.required" => "L'email est requis.",
            "email.email" => "L'email n'est pas valide.",
            "password.required" => "Le mot de passe est requis.",
            "password.min" => "Le mot de passe doit contenir au moins :min caractères.",
            "password.regex" => "Le mot de passe doit contenir au moins une lettre minuscule, une lettre majuscule et un chiffre.",
            "password_confirm.required" => "La confirmation de mot de passe est requise.",
            "password_confirm.same" => "Le mot de passe et la confirmation du mot de passe ne correspondent pas.",
        ];
    }
}
