<?php

namespace App\Http\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login.login');
    }

    public function login(){


        $datos = $this->validate();

    if(Auth::attempt($datos)){
        if(auth()->user($datos)->estado == 0){
            return $this->emit('alerta', 'Usuario desactivado, comuníquese con el administrador del sitio web.');
        }else{
            if(auth()->user($datos)->is_admin == 1){
                return redirect(route('admin.view'));
            }else{
                return redirect(route('usuario.index'));
            }
        }
        }else{
            $this->emit('alerta', 'Correo y/o contraseña incorrectos.');
        }
    }

    public function rules(){
        return[
            'email' => 'required|email',
            'password' => 'required|min:8|string'
        ];
    }
}
