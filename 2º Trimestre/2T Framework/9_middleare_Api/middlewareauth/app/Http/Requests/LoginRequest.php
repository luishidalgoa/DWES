<?php

namespace App\Http\Requests;

use App\Models\User;
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
            'email' => 'required|email',
            'password' => 'required',  
        ];
    }

    public function loginUser(LoginRequest $request)
{
    try {
        // Obtener credenciales validadas
        $credentials = $request->validated();

        // Intentar autenticación
        if (!Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            return response()->json([
                'status' => false,
                'message' => 'Email & password do not match our records'
            ], 401);
        }

        // Obtener usuario autenticado
        $user = User::where('email', $credentials['email'])->firstOrFail();

        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Login failed',
            'error' => $e->getMessage()
        ], 500);
    }
}
}
