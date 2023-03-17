<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Ao chamar o método Auth::check ela verifica no guard configurado se há algum usuário presente. O guard padrão é session que armazena o usuário em sessão.
// Quando chamamos o Auth::attempt passando as credenciais por parâmetro, o que o sistema vai fazer é utilizar o provider de usuários para tentar encontrar o usuário referente as credenciais enviadas. O provider padrão é o Eloquent, ou seja, nós tentamos buscar o usuário no banco de dados.


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        // dd('bia');
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors('Usuário ou senha inválidos');
        }
        return to_route('home');
    }

    public function create(Request $request)
    {
        return view('login.criarUsuario');
    }

    public function store(Request $request)
    {
        dd('bia');
        $dados=$request->except(['_token']);
        $dados['password']=Hash::make($dados['password']);
        $usuario=User::create($dados);
        Auth::login($usuario);

        return to_route('home');

    }

    public function destroy()
    {
        // dd('bia');
        Auth::logout();
        return to_route('login');
    }
}
