<?php

namespace App\Http\Controllers;

use App\Models\Curs;
use App\Models\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;




class CursController extends Controller
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
        $cursos = Curs::all();
        Log::Info($cursos);
        return View::Make('cursos.index', compact('cursos'));
    }
    
    
    public function addGet(){
       return View::Make('cursos.create'); 
    }
    
    public function addPost(Request $request){
        $user=Auth::user();
        $curs=new Curs;
        $curs->curs = $request['curs'];
        $curs->updated_by = $user->id;
        $curs->created_by = $user->id;
        $curs->save();
        return redirect('cursos');
    }
    
    public function edit($id){
        $curs=Curs::find($id);
        return View::Make('cursos.create', compact('curs'));
    }
    
    public function update(Request $request, $id){
        $user=Auth::user();
        $curs=Curs::find($id);
        $curs->curs=$request['curs'];
        $curs->updated_by=$user->id;
        $curs->save();
        return redirect('cursos');
    }
    
    public function remove($id){
        $curs=Curs::destroy($id);
        return redirect('cursos');
    }
    
    public function cursosMenu(){
        $cursos = Curs::all();
        Log::Info($cursos);
        $html="";
        foreach ($cursos as $curs){ 
            $categories=Categoria::where('curs_id','=',$curs->id)->get();
            Log::Info($categories);
            $html.="<li>";
            $html.="<a class='dropdown-toggle text-white' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' href=''>".$curs->curs."</a>";
            $html.="<div class='dropdown-menu'>";
            foreach ($categories as $categoria){
                $html.="<a class='dropdown-item' href='/categories/".$categoria->url."'>".$categoria->categoria."</a>";
            }
            $html.="</div>";
            $html.="</li>";
        }
        return new HtmlString($html);
    }
}
