<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Arquivos;
use Illuminate\Support\Facades\File;
use App\Models\User;




class DrawerController extends Controller
{
    public function tela_inicial()
    {
        $d = 1;
        

    return view('drawer.tela_inicial')->with(compact('d'));
    }

    public function arquivos()
    {
        $user_id = Auth::user()->id;
        $r = Arquivos::where('user_id', $user_id)->get();
        //dd($r);

    return view('drawer.arquivo.arquivos')->with(compact('r'));
    }

    public function cadastrar_arquivo_form()
    {
    return view('drawer.arquivo.cadastrar_arquivo_form');
    }

    public function cadastrar_arquivo(Request $request)
    {
        if (Auth::check()) {
            $n = new Arquivos;
            $n->nome_arquivo = $request->get('nome_arquivo');
            $n->user_id = Auth::user()->id;
            

            if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid()) {
                $resquestArquivo = $request->arquivo;
                $originalName = $resquestArquivo->getClientOriginalName();
                $extension = $resquestArquivo->extension();
                $arquivoExt = $originalName;
                $arquivoName = md5($resquestArquivo->getClientOriginalName().strtotime("now")). "." .$extension;
                $resquestArquivo->move(public_path("img"),$arquivoName);
                $n->arquivo = $arquivoName;
                //dd($u);
            }
            $n->save();
    
        return redirect()->route('admin.arquivos');
        }
    }

    public function apagar_arquivo($id)
    {

        Arquivos::where('id',$id)->delete();   

     return redirect()->route('admin.arquivos');
    }

    public function visualizar_arquivo($id)
    {
        $arquivo = Arquivos::where('id', $id)->first();
    
        if ($arquivo) {
            $filePath = public_path('img/' . $arquivo->arquivo);
            if (File::exists($filePath)) {
                return response()->file($filePath, [
                    'Content-Type' => File::mimeType($filePath),
                ]);
            } else {
                return redirect()->route('admin.arquivos');
            }
        } else {
            return redirect()->route('admin.arquivos');
        }
    }

    public function editar_arquivo_form($id)
    {
        $ed = Arquivos::where('id',Auth::user()->id)
        ->where('id',$id)
        ->get();


        return view('drawer.arquivo.editar_arquivo_form', ['id' => $id], compact('ed'));
        }


    public function editar_arquivo(Request $request,$id)
    {
        Arquivos::where('id', $id)->update([
            'nome_arquivo' => $request->nome_arquivo,
        ]);

        return redirect()->route('admin.arquivos');
    }
}


