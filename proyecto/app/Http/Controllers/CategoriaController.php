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
use Illuminate\Support\Facades\Validator;
use PDF;




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
    
    /**
     * Valida los campos del formulario.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($data){
        return $data->validate([
            'categoria' => ['required', 'string', 'max:255'],
        ]);  
    }
    
    /* Devuelve el formulario para añadir una categoria.
     * @return View
     */
    public function addGet(){
        
       return View::Make('categories.create'); 
    }
    
    /* Añade el pago creado y nos redirije a categories
     * @return route
     */
    public function addPost(Request $request){
        $this->validator($request);
        $user=Auth::user();
        $categoria=new Categoria;
        $categoria->categoria = $request['categoria'];
        $categoria->updated_by = $user->id;
        $categoria->created_by = $user->id;
        $categoria->save();
        return redirect('categories');
    }
    
    /*  Devuelve la vista de edición con los datos del categoria elegido
     *  @return View
     */
    public function edit($id){
        $categoria=Categoria::find($id); 
        
        //EL FALLO ESTÁ AL ENVIAR LA VISTA POR ESO SE REPITE EL EDIT
//        //return view('categories.create')->with(compact('categoria'));
        return View::Make('categories.create', compact('categoria'));
    }
    
    /* Actualiza un pago con los datos que le llegan por HttpRequest y nos devuelve a la vista pagaments
     * @return route
     */
    public function update(Request $request, $id){
        $this->validator($request);
        $user=Auth::user();
        $categoria=Categoria::find($id);
        $categoria->categoria=$request['categoria'];
        $categoria->updated_by=$user->id;
        $categoria->save();
        return redirect('categories');
    }
    
    /* Elimina la categoria seleccionada
     * @return route
     */
    public function remove($id){
        $categoria=Categoria::destroy($id);
        return redirect('categories');
    }
    
    /* Devuelve los <option> pertenecientes a un select donde elegir el curso
     * return HtmlString
     */
    public function select(){
        $cursos = Curs::all();
        Log::Info($cursos);
        $html="";
        foreach ($cursos as $curs){            
            $html.= "<option value=".$curs->id." >".$curs->curs."<option>";
        }
        return new HtmlString($html);
    }
    
    /* Devuelve los <option> pertenecientes al menu dinamico del app.blade
     * return HtmlString
     */
    public function categoriasMenu(){
        $categorias = Categoria::all();
        $html="";
        foreach ($categorias as $categoria){ 
            $pagaments=Pagament::where('categoria_id','=',$categoria->id)->get();
            $html.="<li>";
            $html.="<a class='dropdown-toggle text-white' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' href=''>".$categoria->categoria."</a>";
            $html.="<div class='dropdown-menu'>";
            if (count($pagaments)>0){
                foreach ($pagaments as $pagament){
                    $html.="<a class='dropdown-item sm-1' href='/pagaments/show/".$pagament->id."'>".$pagament->nombre."</a>";
                }
            }else{
                $html.="<a class='dropdown-item' href='#'>No hi ha pagaments per mostrar</a>";
            }
            
            $html.="</div>";
            $html.="</li>";
        }
        return new HtmlString($html);
    }
    
    /* Generamos el PDF del Presupuesto indicado.
     * @return  View
     */
    public function print() {
        $categories = Categoria::all();  
        $filename = "Categories.pdf";
        /* Generamos el pdf y nos vamos.
         */
        $file = base_path().'/documentos/'.$filename;
        $view = View::Make( '/categories/print' , compact('categories') )->render();
        //-- Revisamos el retorno de carro/salto de línea
//        $view = str_replace("-crlf-","<br>",$view);
        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->loadHTML( $view );
        $output = $pdf->output();
        file_put_contents( $file , $output );
        //-- Abrimos el pdf.
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        readfile($file);
    }
    
}
