<?php

namespace App\Models;

//use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

class Pagament extends Model{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion', 'nombre', 'compte_id', 'categoria_id', 'preu', 'data_inicial', 'data_final', 'updated_by', 'created_by', 'updated_at', 'created_at'
    ];   
    
    public $timestamps=true;
    
    protected $table='pagaments';
    
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria','categoria_id')->first();
    }
    
    public function cuenta(){
        return $this->belongsTo('App\Models\Compte','compte_id')->first();
    }
}
