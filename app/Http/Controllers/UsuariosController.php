<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuariosController extends Controller
{
    public function index()
    {
        // $listaUsuarios = User::paginate(15);
        //  $listaVacinas = DB::table('vacinas')->paginate(15);

        return view(
            'usuarios/usuarios',
            // [
            //     'listaUsuarios' => $listaUsuarios,
            // ],

        );
    }
}
