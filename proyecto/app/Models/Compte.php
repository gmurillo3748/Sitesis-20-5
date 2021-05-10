<?php

namespace App\Models;

//use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'compte', 'fuc', 'clau', 'updated_by', 'created_by', 'updated_at', 'created_at'
    ];   
    
    public $timestamps=true;
    
    protected $table='comptes';
}
