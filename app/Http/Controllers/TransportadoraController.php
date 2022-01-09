<?php

namespace App\Http\Controllers;

use App\Models\Transportadora;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransportadoraController extends Controller
{

    public function index() : JsonResponse
    {
        return response()->json(Transportadora::all(), 200);
    }

}
