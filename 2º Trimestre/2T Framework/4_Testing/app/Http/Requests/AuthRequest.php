<?php

// app/Http/Requests/AuthRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; // Importamos la clase base FormRequest para manejar solicitudes de formulario
use Illuminate\Validation\Rule; // Importamos la clase Rule para usar validaciones complejas

class AuthRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta solicitud.
     *
     * @return bool
     */
    public function authorize()
    {
        // Permitimos que todos los usuarios puedan hacer la solicitud (se podría personalizar según el caso)
        return true;
    }

    /**
     * Obtiene las reglas de validación que se aplican a la solicitud.
     *
     * @return array
     */
    public function rules()
    {
        // Si la solicitud es para el registro (api/register)
        if ($this->is('api/register')) {
            return [
                'fullname' => 'required|string|max:100', // El nombre completo es obligatorio, debe ser una cadena y tener un máximo de 100 caracteres
                'age' => 'required|integer', // La edad es obligatoria y debe ser un número entero
                'gender' => 'required|in:male,female,other', // El género es obligatorio y debe ser uno de los tres valores: 'male', 'female' o 'other'
                'address' => 'required|string|max:255', // La dirección es obligatoria, debe ser una cadena y tener un máximo de 255 caracteres
                'telephone' => 'required|string|max:9', // El teléfono es obligatorio, debe ser una cadena con un máximo de 9 caracteres
                'email' => 'required|string|email|max:50|unique:professors', // El correo electrónico es obligatorio, debe ser una dirección válida y única en la tabla 'professors'
                'password' => 'required|string|min:6|confirmed', // La contraseña es obligatoria, debe ser una cadena con un mínimo de 6 caracteres y debe ser confirmada
            ];
        }

        // Si la solicitud es para iniciar sesión (api/login)
        if ($this->is('api/login')) {
            return [
                'email' => 'required|email', // El correo electrónico es obligatorio y debe ser una dirección válida
                'password' => 'required', // La contraseña es obligatoria
            ];
        }

        // Si no es ni para registro ni para inicio de sesión, no aplicamos ninguna regla
        return [];
    }
}
