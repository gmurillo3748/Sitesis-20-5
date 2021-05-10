<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categoria', 'updated_by', 'created_by', 'updated_at', 'created_at'
    ];   
    
    public $timestamps=true;
    
    protected $table='categorias';
    
    public function curs(){
        Log::Info($this->belongsTo('App\Models\Categoria', 'categoria_id')->first());
        return "prova";
    }
}
