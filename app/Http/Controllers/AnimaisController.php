<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;

class AnimaisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listaAnimais = Animal::paginate(15);
        //  $listaAnimais = DB::table('animais')->paginate(15);

        return view(
            'animais/animais',
            [
                'listaAnimais' => $listaAnimais,
            ],
        );
    }

    public function getAnimal(int $id)
    {
        $animal = Animal::find($id);

        return view(
            'animais/cadastro',
            [
                'animal' => $animal,
            ]
        );
    }

    public function buscaAnimal(Request $request)
    {
        //$q = Input::get('q');
        $q = $request->input('q');

        //Conversão da data
        $dataBr = $q;
        $date = str_replace('/', '-', $dataBr);
        $dataSql = date("Y-m-d", strtotime($date));

        //Busca
        if ($q != "") {
            $listaAnimais = Animal::where('nome', 'LIKE', '%' . $q . '%')
                ->orWhere('data_nascimento', 'LIKE', '%' . $dataSql . '%')
                ->orWhere('sus', 'LIKE', '%' . $q . '%')
                ->orWhere('cpf', 'LIKE', '%' . $q . '%')
                ->orWhere('telefone', 'LIKE', '%' . $q . '%')
                ->orWhere('telefone_alternativo', 'LIKE', '%' . $q . '%')
                ->paginate(15)->setPath('/animais/busca');
            $pagination = $listaAnimais->appends(array(
                'q' => $q
            ));
            if (count($listaAnimais) > 0)
                return view(
                    'animais/animais',
                    [
                        'listaAnimais' => $listaAnimais
                    ]
                );
        } else {
            return redirect()->route('animais');
        }

        return view('animais/animais')->withMessage('No Details found. Try to search again !');
    }

    public function visualizarAnimal(int $id)
    {
        $animal = Animal::find($id);

        return view(
            'animais/visualizacao',
            [
                'animal' => $animal,
            ]
        );
    }

    public function telaCadastroAnimal()
    {
        return view(
            'animais/cadastro'
        );
    }}
