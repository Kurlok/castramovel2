<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Proprietario;
use App\Residencia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

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
        $listaResidencias = Residencia::all()
        ->sortBy('bairro')
        ->sortBy('logradouro')
        ->sortBy('numero');
        $listaProprietarios = Proprietario::all()
        ->sortBy('nome');

        return view(
            'animais/cadastro',
            [
                'animal' => $animal,
                'listaResidencias' => $listaResidencias,
                'listaProprietarios' => $listaProprietarios,
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


        // $animalQB = DB::table('animais')
        //     ->join('proprietarios', 'animais.proprietario_id', '=', 'proprietario.id')
        //     ->join('residencias', 'animais.residencia_id', '=', 'residencia.id')
        //     ->where('genero', 'LIKE', '%' . $q . '%')
        //     ->get();

        //Busca
        if ($q != "") {
            $listaAnimais = Animal::whereHas('proprietario', function (Builder $query) {
                $query->where('nome', 'like', $q);
            })
            // ->orWhereHas('residencia', function (Builder $query) {
            //     $query->where('logradouro', 'like', $q);
            // })
            // ->orWhere('nome', 'LIKE', '%' . $q . '%')
            //     ->orWhere('data_nascimento', 'LIKE', '%' . $dataSql . '%')
            //     ->orWhere('genero', 'LIKE', '%' . $q . '%')
            //     ->orWhere('especie', 'LIKE', '%' . $q . '%')
           ->paginate(15)->setPath('/animais/busca');

        //     $listaAnimais = DB::table('animais')
        //    ->join('proprietarios', 'animais.proprietario_id', '=', 'proprietarios.id')
        //   ->join('residencias', 'animais.residencia_id', '=', 'residencias.id')
        //     ->where('genero', 'LIKE', '%' . $q . '%')
        //     ->paginate(15)->setPath('/animais/busca');
        //    print_r($listaAnimais);

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

        // return view('animais/animais')->withMessage('No Details found. Try to search again !');
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

    public function cadastrarAnimal(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required',
            'genero' => 'required',
            'data_nascimento' => 'required',
        ]);

        $animal = new Animal();
        $animal->nome = $request->nome;
        $animal->especie = $request->especie;
        $animal->genero = $request->genero;
        $animal->data_nascimento = $request->data_nascimento;
        $animal->cidade_natal = $request->cidade_natal;
        $animal->historico_viagens = $request->historico_viagens;
        $animal->outras_informacoes = $request->outras_informacoes;
        $animal->proprietario_id = $request->proprietario;
        $animal->residencia_id = $request->residencia;

        $animal->save();

       return redirect()->route('animais')
        ->with('mensagemAlteracaoDados', 'Dados alterados com sucesso!');

        // return view(
        //     'animais/cadastro',
        //     ['animal' => $animal]
        // );
    }

    public function alterarAnimal(Request $request, int $id)
    {
        try {

            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
                'especie' => 'required',
                'genero' => 'required',
                'data_nascimento' => 'required',
            ]);
            
            $animal = Animal::find($id);
            $animal->nome = $request->nome;
            $animal->especie = $request->especie;
            $animal->genero = $request->genero;
            $animal->data_nascimento = $request->data_nascimento;
            $animal->cidade_natal = $request->cidade_natal;
            $animal->historico_viagens = $request->historico_viagens;
            $animal->outras_informacoes = $request->outras_informacoes;
            $animal->proprietario_id = $request->proprietario;
            $animal->residencia_id = $request->residencia;

            $animal->save();
            return back()->with('mensagemSucesso', "Alteração realizada com sucesso.");
        } catch (Exception $ex) {
            return back()->with('mensagemErro', "Ocorreu um erro (" + $ex + ").");
        }
    }

    public function deletarAnimal(int $id)
    {
        $animal = Animal::find($id);
        $animal->delete();

        return redirect()->route('animais');
    }

    public function telaCadastroAnimal()
    {
        $listaResidencias = Residencia::all()
        ->sortBy('complemento')
        ->sortBy('numero')
        ->sortBy('logradouro')
        ->sortBy('bairro');
        $listaProprietarios = Proprietario::all()
        ->sortBy('nome');

        return view(
            'animais/cadastro',
            [
                'listaResidencias' => $listaResidencias,
                'listaProprietarios' => $listaProprietarios,
            ]
        );
    }
}
