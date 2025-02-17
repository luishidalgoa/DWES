<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //devuelve index hello world
    public function index()
    {
        //return 'Hello World';
        // ahora devolvemos todos los usuario en JSON
        $users = User::all();
        return response()->json($users);
    }

    public function show($userId)
    {
        // Buscar el usuario por su ID
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Retornar los datos del usuario
        return response()->json($user);
    }
}