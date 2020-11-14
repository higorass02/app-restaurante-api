<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Cardapios;
use App\Solicitacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SolicitacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = auth()->user()->name;

        $return = array();
        foreach(Solicitacoes::all() as $key => $value){
            $return[$key]['id'] = $value->id;
            $return[$key]['cliente'] = Contact::find($value->id_contacts);
            $return[$key]['pedido'] = Cardapios::find($value->id_cardapio);
        }
        // var_dump($return);
        // exit;
        // var_dump($this->listagem_json());
        // exit;

        return view('solicitacoes.index',[
            'nome_logado' => $username,
            'lista_solicitacoes'=>$return,
            'total' => '1'
            ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listagem_json()
    {
        $return = array();
        foreach(Solicitacoes::all() as $key => $value){
            $return[$key]['id'] = $value->id;
            $return[$key]['cliente'] = Contact::find($value->id_contacts);
            $return[$key]['pedido'] = Cardapios::find($value->id_cardapio);
        }
        return response()->json($return);
    }
    
}
