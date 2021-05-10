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
    
    
    public function addGet(){
       return View::Make('ususaris.create'); 
    }
    
    public function addPost(Request $request){
        $user=Auth::user();
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
        $user=Auth::user();
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
