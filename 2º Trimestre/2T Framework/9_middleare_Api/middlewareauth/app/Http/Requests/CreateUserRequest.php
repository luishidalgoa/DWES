<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            //En las reglas, solicitamos los datos necesarios:
            'name' => 'required',
            //el email ha de ser único dentro de la tabla usuarios en el campo email
            'email' => 'required|email|unique:users, email',
            'password' => 'required', //podriamos indicar longitud minuma...

        ];
    }
}
