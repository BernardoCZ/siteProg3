<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'asc')->get();

        return view('usuarios.index', ['usuarios' => $usuarios, 'pagina' => 'usuarios']);
    }

    public function create()
    {
        return view('usuarios.create', ['pagina' => 'usuarios']);
    }

    public function insert(Request $form)
    {
        $form->admin = false;
        
        if ($form->admin == "on")
        {
            $form->admin = true;
        }
        $usuario = new Usuario();

        $usuario->name = $form->name;
        $usuario->email = $form->email;
        $usuario->username = $form->username;
        $usuario->password = Hash::make($form->password);
        $usuario->admin = $form->admin;

        $usuario->save();

        event(new Registered($usuario));

        Auth::login($usuario);

        return redirect()->route('verification.notice');
    }

    // Ações de login
    public function login(Request $form)
    {
        // Está enviando o formulário
        if ($form->isMethod('POST'))
        {
            $credenciais = $form->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);

            $lembrado = false;
            
            if ($form->lembrar == "on")
            {
                $lembrado = true;
            }
               
            // Tenta o login
            if (Auth::attempt($credenciais, $lembrado)) {
                session()->regenerate();
                return redirect()->route('home');
            }
            else {
                // Login deu errado (usuário ou senha inválidos)
                return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos.');
            }
        }

        return view('usuarios.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function profile()
    {
        return view('usuarios.profile', ['pagina' => 'perfil']);
    }
    public function edit()
    {
        return view('usuarios.edit', ['usuario' => Auth::user(), 'pagina' => 'editar_perfil']);
    }
    public function update(Request $form)
    {
        $usuario = Auth::user();
        $usuario->name = $form->name;
        $usuario->email = $form->email;

        $usuario->save();

        return redirect()->route('profile');
    }
    public function alterar_senha()
    {
        return view('usuarios.alterar_senha', ['usuario' => Auth::user(), 'pagina' => 'editar_senha']);
    }
    public function update_senha(Request $form)
    {
        $usuario = Auth::user();
        if ($usuario->password == Hash::make($form->password))
        {
            if ($form->new_password == $form->confirm_password)
            {
                $usuario->password = Hash::make($form->new_password);
                $usuario->save();
            }
            else
            {
                return redirect()->route('profile.senha')->with('erro', 'A senha de confirmação é diferente da nova senha.');
            }
        }
        else
        {
            return redirect()->route('profile.senha')->with('erro', 'Senha atual inválida.');
        }

        return redirect()->route('profile');
    }
}
