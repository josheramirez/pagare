<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Requests\CambiarClaveRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConfiguracionController extends Controller
{
    public function index()
    {
        return view('administrador.configuracion.index');
    }

    public function cambiarPassword(CambiarClaveRequest $request)
    {
        if (!(Hash::check($request->get('password_antigua'), Auth::user()->password))) {
            // The passwords matches
            return redirect()
                ->back()
                ->with("error","Su contraseña actual no coincide con la contraseña que proporcionó. Inténtalo de nuevo.");
        }

        if(strcmp($request->get('password_antigua'), $request->get('password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","La nueva contraseña no puede ser igual a su contraseña actual. Por favor, elija una contraseña diferente.");
        }

        $user = Auth::user();
        $user->password = $request->password;
        $user->save();

        return redirect()->back()->with("success","Contraseña cambiada con éxito!");
    }
}
