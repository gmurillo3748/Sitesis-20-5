<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;




class UsuariController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $usuaris = User::all();
        return View::Make('usuaris.index', compact('usuaris'));
    }
    
    /**
     * Valida los campos del formulario.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($data){
        return $data->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'rol' => ['required'],
            'activo' => ['required'],
        ]);  
    }
    
    public function addGet(){
       return View::Make('ususaris.create'); 
    }
    
    public function addPost(Request $request){
        $this->validator($request);
        $usuari=new User;
        $usuari->name = $request['name'];
        $usuari->email = $request['email'];
        $usuari->password = bcrypt($request['password']);
        $usuari->rol = $request['rol'];
        $usuari->activo = $request['activo'];
        $usuari->save();
        return redirect('usuaris');
    }
    
    public function edit($id){
        $usuari=User::find($id);
        return View::Make('usuaris.create', compact('usuari'));
    }
    
    public function update(Request $request, $id){
        $this->validator($request);
        $usuari=User::find($id);
        $usuari->name = $request['name'];
        $usuari->email = $request['email'];
        $usuari->password = bcrypt($request['password']);
        $usuari->rol = $request['rol'];
        $usuari->activo = $request['activo'];
        $usuari->save();
        return redirect('usuaris');
    }
    
    public function remove($id){
        $usuari=User::destroy($id);
        return redirect('usuaris');
    }
}
