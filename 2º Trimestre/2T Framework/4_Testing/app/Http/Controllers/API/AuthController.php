<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use App\Models\Professor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Método para registrar un nuevo profesor
    public function register(AuthRequest $request)
    {
        // Validamos los datos del request según las reglas de AuthRequest
        $validated = $request->validated();

        // Creamos un nuevo profesor en la base de datos con los datos validados
        $professor = Professor::create([
            'fullname' => $validated['fullname'],  // Nombre completo del profesor
            'age' => $validated['age'],            // Edad del profesor
            'gender' => $validated['gender'],      // Género del profesor
            'address' => $validated['address'],    // Dirección del profesor
            'telephone' => $validated['telephone'],// Teléfono del profesor
            'email' => $validated['email'],        // Correo electrónico del profesor
            'password' => Hash::make($validated['password']), // Contraseña del profesor (encriptada)
        ]);

        // Retornamos una respuesta JSON con un mensaje de éxito y los datos del profesor
        return response()->json([
            'message' => 'Registro exitoso. Por favor, inicie sesión.',
            'professor' => new AuthResource($professor) // Retornamos los datos del profesor usando un recurso para formatearlos
        ], 201); // Código HTTP 201 (creado)
    }

    // Método para iniciar sesión
    public function login(AuthRequest $request)
    {
        // Validamos los datos del request
        $validated = $request->validated();
    
        // Buscamos al profesor en la base de datos por el correo electrónico proporcionado
        $professor = Professor::where('email', $validated['email'])->first();
    
        // Si no encontramos al profesor o la contraseña no coincide, lanzamos una excepción de validación
        if (!$professor || !Hash::check($validated['password'], $professor->password)) {
            return response()->json([
                'message' => 'Credenciales incorrectas',
                'errors' => [
                    'email' => ['El correo electrónico o la contraseña son incorrectos.']
                ]
            ], 401); // Código HTTP 401 (Unauthorized)
        }
    
        // Si las credenciales son correctas, generamos un token de acceso para la sesión
        $token = $professor->createToken('auth_token')->plainTextToken;
    
        // Retornamos una respuesta JSON con el mensaje de éxito y el token de acceso
        return response()->json([
            'message' => 'Inicio de sesión exitoso.',
            'access_token' => $token,   // El token de acceso
            'token_type' => 'Bearer'    // El tipo de token
        ]);
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        // Si el usuario está autenticado, eliminamos su token actual
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete(); // Eliminamos el token de acceso actual

            // Retornamos una respuesta JSON indicando que la sesión se cerró correctamente
            return response()->json([
                'message' => 'Sesión cerrada exitosamente'
            ]);
        }

        // Si no hay sesión activa, retornamos un mensaje de error
        return response()->json([
            'message' => 'No hay sesión activa.'
        ], 400); // Código HTTP 400 (Bad Request)
    }
}
