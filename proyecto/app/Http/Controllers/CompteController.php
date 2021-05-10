<?php

namespace App\Http\Controllers;

use App\Models\Compte;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;




class CompteController extends Controller
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
        $comptes = Compte::all();
        Log::Info($comptes);
        return View::Make('comptes.index', compact('comptes'));
    }
    
    
    public function addGet(){
       return View::Make('comptes.create'); 
    }
    
    public function addPost(Request $request){
        $user=Auth::user();
        $compte=new Compte;
        $compte->compte = $request['compte'];
        $compte->fuc = $request['fuc'];
        $compte->clau = $request['clau'];
        $compte->updated_by = $user->id;
        $compte->created_by = $user->id;
        $compte->save();
        return redirect('comptes');
    }
    
    public function edit($id){
        $compte=Compte::find($id);
        return View::Make('comptes.create', compact('compte'));
    }
    
    public function update(Request $request, $id){
        $user=Auth::user();
        $compte=Compte::find($id);
        $compte->compte = $request['compte'];
        $compte->fuc = $request['fuc'];
        $compte->clau = $request['clau'];
        $compte->updated_by=$user->id;
        $compte->save();
        return redirect('comptes');
    }
    
    public function remove($id){
        $compte=Compte::destroy($id);
        return redirect('comptes');
    }
}
