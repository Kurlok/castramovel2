<?php

namespace App\Http\Controllers;

use App\Proprietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use ProprietarioSeeder;

class ProprietariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listaProprietarios = Proprietario::paginate(15);
        //  $listaProprietarios = DB::table('proprietarios')->paginate(15);

        return view(
            'proprietarios/proprietarios',
            [
                'listaProprietarios' => $listaProprietarios,
            ],
        );
    }

    public function getProprietario(int $id)
    {
        $proprietario = Proprietario::find($id);

        return view(
            'proprietarios/cadastro',
            [
                'proprietario' => $proprietario,
            ]
        );
    }

    public function buscaProprietario(Request $request)
    {
        //$q = Input::get('q');
        $q = $request->input('q');

        //Conversão da data
        $dataBr = $q;
        $date = str_replace('/', '-', $dataBr);
        $dataSql = date("Y-m-d", strtotime($date));

        //Busca
        if ($q != "") {
            $listaProprietarios = Proprietario::where('nome', 'LIKE', '%' . $q . '%')
                ->orWhere('data_nascimento', 'LIKE', '%' . $dataSql . '%')
                ->orWhere('sus', 'LIKE', '%' . $q . '%')
                ->orWhere('telefone', 'LIKE', '%' . $q . '%')
                ->orWhere('telefone_alternativo', 'LIKE', '%' . $q . '%')
                ->paginate(15)->setPath('/proprietarios/busca');
            $pagination = $listaProprietarios->appends(array(
                'q' => $q
            ));
            if (count($listaProprietarios) > 0)
                return view(
                    'proprietarios/proprietarios',
                    [
                        'listaProprietarios' => $listaProprietarios
                    ]
                );
        } else {
            return redirect()->route('proprietarios');
        }

        return view('proprietarios/proprietarios')->withMessage('No Details found. Try to search again !');
    }

    public function visualizarProprietario(int $id)
    {
        $proprietario = Proprietario::find($id);

        return view(
            'proprietarios/visualizacao',
            [
                'proprietario' => $proprietario,
            ]
        );
    }

    public function telaCadastroProprietario()
    {
        return view(
            'proprietarios/cadastro'
        );
    }

    public function cadastrarProprietario(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);

        //Trabalhando com os checkboxes
        // if ($request->obito == 'on') $obito = 'Sim';
        // else  $obito = 'Não';
        // if ($request->gestante == 'on') $gestante = 'Sim';
        // else  $gestante = 'Não';

        $proprietario = new Proprietario();
        $proprietario->nome = $request->nome;
        $proprietario->data_nascimento = $request->data_nascimento;
        $proprietario->sus = $request->sus;
        $proprietario->telefone = $request->telefone;
        $proprietario->telefone_alternativo = $request->telefone_alternativo;
        $proprietario->save();

        return redirect()->route('proprietarios');
    }

    public function alterarProprietario(Request $request, int $id)
    {
        try {

            $proprietario = Proprietario::find($id);
            $proprietario->nome = $request->nome;
            $proprietario->data_nascimento = $request->data_nascimento;
            $proprietario->sus = $request->sus;
            $proprietario->telefone = $request->telefone;
            $proprietario->telefone_alternativo = $request->telefone_alternativo;
            $proprietario->save();
            return back()->with('mensagemSucesso', "Alteração realizada com sucesso.");
        } catch (Exception $ex) {
            return back()->with('mensagemErro', "Ocorreu um erro (" + $ex + ").");
        }
    }

    public function deletarProprietario(int $id)
    {
        $proprietario = Proprietario::find($id);
        $proprietario->delete();

        return redirect()->route('proprietarios');
    }


}
