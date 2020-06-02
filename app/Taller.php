<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_fiscal', 'cif', 'direccion', 'numero', 'codigopostal', 'localidad', 'provincia', 'pais', 'telefono','user_id'
    ];

    public function userID() {
        return $this->belongsTo('App\User');
    }
}
