<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Curs;
use App\Models\Pagament;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;




class CategoriaController extends Controller
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
        $categories = Categoria::all();
        return View::Make('categories.index', compact('categories'));
    }
    
    
    public function addGet(){
        
       return View::Make('categories.create'); 
    }
    
    public function addPost(Request $request){
        $user=Auth::user();
        $categoria=new Categoria;
        $categoria->categoria = $request['categoria'];
        $categoria->updated_by = $user->id;
        $categoria->created_by = $user->id;
        $categoria->save();
        return redirect('categories');
    }
    
    public function edit($id){
        $categoria=Categoria::find($id); 
        
        //EL FALLO ESTÁ AL ENVIAR LA VISTA POR ESO SE REPITE EL EDIT
//        //return view('categories.create')->with(compact('categoria'));
        return View::Make('categories.create', compact('categoria'));
    }
    
    public function update(Request $request, $id){
        $user=Auth::user();
        $categoria=Categoria::find($id);
        $categoria->categoria=$request['categoria'];
        $categoria->updated_by=$user->id;
        $categoria->save();
        return redirect('categories');
    }
    
    public function remove($id){
        $categoria=Categoria::destroy($id);
        return redirect('categories');
    }
    
    public function select(){
        $cursos = Curs::all();
        Log::Info($cursos);
        $html="";
        foreach ($cursos as $curs){            
            $html.= "<option value=".$curs->id." >".$curs->curs."<option>";
        }
        return new HtmlString($html);
    }
    
    public function categoriasMenu(){
        $categorias = Categoria::all();
        $html="";
        foreach ($categorias as $categoria){ 
            $pagaments=Pagament::where('categoria_id','=',$categoria->id)->get();
            $html.="<li>";
            $html.="<a class='dropdown-toggle text-white' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' href=''>".$categoria->categoria."</a>";
            $html.="<div class='dropdown-menu'>";
            foreach ($pagaments as $pagament){
                $html.="<a class='dropdown-item' href='/pagaments/show/".$pagament->id."'>".$pagament->nombre."</a>";
            }
            $html.="</div>";
            $html.="</li>";
        }
        return new HtmlString($html);
    }
    
}
