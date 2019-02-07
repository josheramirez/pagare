<?php

namespace App\Http\Controllers\Administrador;

use App\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function index()
    {
        return view('administrador.logs.index');
    }

    public function find(Request $request)
    {
        $logs = Log::where('pagare', $request->codigo)->get();

        return view('administrador.logs.show', compact('logs'));
    }
}
