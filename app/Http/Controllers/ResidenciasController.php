<?php

namespace App\Http\Controllers;

use App\Residencia;
use Illuminate\Http\Request;

class ResidenciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $listaResidencias = Residencia::paginate(15);
        //  $listaProprietarios = DB::table('proprietarios')->paginate(15);

        return view(
            'residencias/residencias',
            [
                'listaResidencias' => $listaResidencias,
            ],
        );
    }

    public function telaCadastroResidencia()
    {
        return view(
            'residencias/cadastro'
        );
    }

}
