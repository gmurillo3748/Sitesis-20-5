<?php

namespace App\Http\Controllers;

use App\Models\Compte;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use PDF;



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
        return View::Make('comptes.index', compact('comptes'));
    }
    
     /**
     * Valida los campos del formulario.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($data){
        return $data->validate([
            'compte' => ['required', 'string', 'max:255'],
            'fuc' => ['required', 'string', 'max:255'],
            'clau' => ['required', 'string', 'max:255'],
        ]);  
    }
    
    /* Devuelve el formulario para añadir un compte.
     * @return View
     */
    public function addGet(){
       return View::Make('comptes.create'); 
    }
    
    /* Añade el pago creado y nos redirije a comptes
     * @return route
     */
    public function addPost(Request $request){
        $this->validator($request);
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
    
    /*  Devuelve la vista de edición con los datos del compte elegido
     *  @return View
     */
    public function edit($id){
        $compte=Compte::find($id);
        return View::Make('comptes.create', compact('compte'));
    }
    
    /* Actualiza un pago con los datos que le llegan por HttpRequest y nos devuelve a la vista comptes
     * @return route
     */
    public function update(Request $request, $id){
        $this->validator($request);
        $user=Auth::user();
        $compte=Compte::find($id);
        $compte->compte = $request['compte'];
        $compte->fuc = $request['fuc'];
        $compte->clau = $request['clau'];
        $compte->updated_by=$user->id;
        $compte->save();
        return redirect('comptes');
    }
    
    /* Elimina el compte seleccionada
     * @return route
     */
    public function remove($id){
        $compte=Compte::destroy($id);
        return redirect('comptes');
    }
    
    /* Generamos el PDF del Presupuesto indicado.
     * @return  View
     */
    public function print() {
        $comptes = Compte::all();  
        $filename = "Comptes.pdf";
        /* Generamos el pdf y nos vamos.
         */
        $file = base_path().'/documentos/'.$filename;
        $view = View::Make( '/comptes/print' , compact('comptes') )->render();
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
