<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; // Importamos la clase base FormRequest para manejar solicitudes de formulario

class ProfessorRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     */
    public function authorize(): bool
    {
        // Permitimos que todos los usuarios puedan hacer la solicitud (se podría personalizar según el caso)
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required|string|max:100', // El nombre completo del profesor es obligatorio, debe ser una cadena con un máximo de 100 caracteres
            'age' => 'required|integer|min:18|max:100', // La edad es obligatoria, debe ser un número entero entre 18 y 100 años
            'gender' => 'required|in:male,female,other', // El género es obligatorio, y debe ser uno de los siguientes: 'male', 'female', 'other'
            'address' => 'required|string|max:255', // La dirección es obligatoria, debe ser una cadena con un máximo de 255 caracteres
            'telephone' => 'required|string|max:9', // El teléfono es obligatorio, debe ser una cadena con un máximo de 9 caracteres
            'email' => 'required|string|max:50|email|unique:professors,email,' . $this->route('professor'), // El correo electrónico es obligatorio, debe ser válido y único en la tabla 'professors', con excepción del profesor actual, utilizando el ID proporcionado en la ruta
        ];
    }
}
