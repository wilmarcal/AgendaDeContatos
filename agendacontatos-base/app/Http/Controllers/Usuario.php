<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Endereco;
use App\Models\Telefone;
use Illuminate\Database\Eloquent\Model;
use DB;

class Usuario extends Controller
{
    //

    public function home(){

        $user = User::all();

        return view('home', [
            'user' => $user
        ]);
    }

    public function cadastro(){


        return view('cadastro');
    }

    public function registrar(Request $request){

            $usuario = new User;
            $usuario->name = $request->nome;
            $usuario->surname = $request->sobrenome;
            $usuario->email = $request->email;
            $usuario->password = "nao";
            $usuario->categoria = $request->categoria;
            $usuario->save();

            $getUser = User::where('email', '=', $request->email)
            ->first();
            $id = $getUser->id;


            $tel = new Telefone;
            $tel->ddd = $request->ddd;
            $tel->telefone = $request->telefone;
            $tel->user_id = $id;
            $tel->save();

            

            $adress = new Endereco;
            $adress->cep = $request->cep;
            $adress->endereco = $request->logradouro;
            $adress->numero = $request->numero;
            $adress->bairro = $request->bairro;
            $adress->cidade = $request->cidade;
            $adress->estado = $request->estado;
            $adress->user_id = $id;
            $adress->save();



            \Illuminate\Support\Facades\Mail::send(new \App\Mail\agendacontatos());
            

        return view('cadastro');
    }

    public function excluir(Request $request, $id){
        $user = User::all();
        
        $del = User::find($id)->delete();
        $tel = Telefone::where('user_id', '=', $id)->delete();
        $end = Endereco::where('user_id', '=', $id)->delete();

        return view('home', [
            'user' => $user
        ]);

    }

        public function detalhes(Request $request, $id){
            $user = User::find($id);
            $telefone = Telefone::where('user_id', '=', $id)->get();
            $endereco = Endereco::where('user_id', '=', $id)->get();
            
    
            return view('detalhes', [
                'user' => $user,
                'telefone' => $telefone,
                'endereco' => $endereco
            ]);
    
        }


        public function renderTel(Request $request, $id){
            $user = $id;
    
            return view('teledit', [
                'user' => $user
            ]);
    
        }

        public function renderEnd(Request $request, $id){
            $user = $id;

    
            return view('endedit', [
                'user' => $user
            ]);
    
        }

        public function addTel(Request $request, $id){
            $user = User::all();

            $tel = new Telefone;
            $tel->ddd = $request->ddd;
            $tel->telefone = $request->telefone;
            $tel->user_id = $request->id;
            $tel->save();
            
    
            return view('home', [
                'user' => $user
            ]);
    
        }

        public function addEnd(Request $request, $id){
            $user = User::all();

            $end = new Endereco;
            $end->cep = $request->cep;
            $end->endereco = $request->logradouro;
            $end->numero = $request->numero;
            $end->bairro = $request->bairro;
            $end->cidade = $request->cidade;
            $end->estado = $request->estado;
            $end->user_id = $request->id;
            $end->save();
            
    
            return view('home', [
                'user' => $user
            ]);
    
        }

}