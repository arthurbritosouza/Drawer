<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    
use App\Models\Anotacao;



class AnotacaoController extends Controller
{
    public function anotacao($id)
    {
        $anotacao = Anotacao::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->select('nome_anotacao', 'anotacao')
            ->get(); 
        
        return view('drawer.anotacao.anotacao', ['id' => $id], compact('anotacao'));
    }
    
    public function cadastrar_anotacao(Request $request)
    {
        $a = new Anotacao;
        $a->user_id = Auth::user()->id;
        $a->nome_anotacao = $request->get('nome_anotacao');
        $a->anotacao = $request->get('anotacao');
        $a->save();
    
        $l_id = Anotacao::latest('id')->first()->id;

        return redirect()->route('anotacao', ['id' => $l_id]);
    }

    public function apagar_anotacao($id)
    {

        Anotacao::where('id',$id)->delete();   

     return redirect()->route('admin.arquivos');
    }


    
}
