<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index():JsonResponse{
        return response()->json("Hello World", 200);
    }

    //Añadimos una segunda función de ejemplo para observar la diferencia:
   public function noAccess():JsonResponse{
    return response()->json("No access", 200);
    }
}
