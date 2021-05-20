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
     * Devuelve el index de pagaments
     *
     * @return View
     */
    public function index(){
//        $fecha=date('Y-m-d');
//        Log::Info($fecha);
        //$pagaments = Pagament::where('data_inicial','>=',$fecha)->where('data_final','<=',$fecha)->get();
        $pagaments = Pagament::all();
        return View::Make('pagaments.index', compact('pagaments'));
    }
    
    
    /**
     * Valida los campos del formulario.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($data){
        return $data->validate([
            'descripcion' => ['required'],
            'nombre' => ['required'],
            'compte_id' => ['required'],
            'categoria_id' => ['required'],
            'preu' => ['required'],
            'data_inicial' => ['required'],
            'data_final' => ['required'],
        ]);  
    }
    
    /* Devuelve el formulario para añadir un pagament.
     * @return View
     */
    public function addGet(){
       return View::Make('pagaments.create'); 
    }
    
    /* Añade el pago creado y nos redirije a pagaments
     * @return route
     */
    public function addPost(Request $request){
        $this->validator($request);
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
    
    /*  Devuelve la vista de edición con los datos del pagament elegido
     *  @return View
     */
    public function edit($id){
        $pagament=Pagament::find($id);
        return View::Make('pagaments.create', compact('pagament'));
    }
    
    /* Actualiza un pago con los datos que le llegan por HttpRequest y nos devuelve a la vista pagaments
     * @return route
     */
    public function update(Request $request, $id){
        $this->validator($request);
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
    
    /* Devuelve los <option> pertenecientes a un select donde elegir el curso
     * return HtmlString
     */
    public function selectCurs(){
        $cursos = Curs::all();
        Log::Info($cursos);
        $html="";
        foreach ($cursos as $curs){            
            $html.= "<option value=".$curs->id." >".$curs->curs."<option>";
        }
        return new HtmlString($html);
    }
    
    /* Devuelve los <option> pertenecientes a un select donde elegir la categoria
     * return HtmlString
     */
    public function selectCategories(){
        $categories = Categoria::all();
        $html="";
        foreach ($categories as $categoria){            
            $html.= "<option value=".$categoria->id." >".$categoria->categoria."<option>";
        }
        return new HtmlString($html);
    }
    
    /* Devuelve los <option> pertenecientes a un select donde elegir la cuenta
     * return HtmlString
     */
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
    
    
    /* Generamos el PDF del Presupuesto indicado.
     * @return  View
     */
    public function print() {
        $pagaments = Pagament::all();  
        $filename = "Pagaments.pdf";
        /* Generamos el pdf y nos vamos.
         */
        $file = base_path().'/documentos/'.$filename;
        $view = View::Make( '/pagaments/print' , compact('pagaments') )->render();
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
