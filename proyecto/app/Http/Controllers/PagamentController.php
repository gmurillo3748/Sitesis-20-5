<?php

namespace App\Http\Controllers;

use App\Models\Pagament;
use App\Models\Curs;
use App\Models\Compte;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;




class PagamentController extends Controller
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
//        $fecha=date('Y-m-d');
//        Log::Info($fecha);
        //$pagaments = Pagament::where('data_inicial','>=',$fecha)->where('data_final','<=',$fecha)->get();
        $pagaments = Pagament::all();
        return View::Make('pagaments.index', compact('pagaments'));
    }
    
    
    public function addGet(){
       return View::Make('pagaments.create'); 
    }
    
    public function addPost(Request $request){
        $user=Auth::user();
        $pagament=new Pagament;
        $pagament->descripcion = $request['descripcion'];
        $pagament->nombre = $request['nombre'];
        $pagament->compte_id = $request['compte_id'];
        $pagament->categoria_id = $request['categoria_id'];
        $pagament->preu = $request['preu'];
        $pagament->data_inicial = $request['data_inicial'];
        $pagament->data_final = $request['data_final'];
        $pagament->updated_by = $user->id;
        $pagament->created_by = $user->id;
        $pagament->save();
        return redirect('pagaments');
    }
    
    public function edit($id){
        $pagament=Pagament::find($id);
        return View::Make('pagaments.create', compact('pagament'));
    }
    
    public function update(Request $request, $id){
        $user=Auth::user();
        $pagament=Pagament::find($id);
        $pagament->descripcion = $request['descripcion'];
        $pagament->nombre = $request['nombre'];
        $pagament->compte_id = $request['compte_id'];
        $pagament->categoria_id = $request['categoria_id'];
        $pagament->preu = $request['preu'];
        $pagament->data_inicial = $request['data_inicial'];
        $pagament->data_final = $request['data_final'];
        $pagament->updated_by=$user->id;
        $pagament->save();
        return redirect('pagaments');
    }
    
    public function selectCurs(){
        $cursos = Curs::all();
        Log::Info($cursos);
        $html="";
        foreach ($cursos as $curs){            
            $html.= "<option value=".$curs->id." >".$curs->curs."<option>";
        }
        return new HtmlString($html);
    }
    
    public function selectCategories(){
        $categories = Categoria::all();
        Log::Info($categories);
        $html="";
        foreach ($categories as $categoria){            
            $html.= "<option value=".$categoria->id." >".$categoria->categoria."<option>";
        }
        return new HtmlString($html);
    }
    
    public function selectComptes(){
        $comptes = Compte::all();
        Log::Info($comptes);
        $html="";
        foreach ($comptes as $compte){            
            $html.= "<option value=".$compte->id." >".$compte->compte."<option>";
        }
        return new HtmlString($html);
    }
    
    public function show($id){
        $pagament=Pagament::where('id','=',$id)->first();
        return View::Make('pagaments.show', compact('pagament'));
    }
}
