<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = "levels";
    protected $primaryKey = "user_id";
    public $timestamps = false;

    /**
     * Relación con User. Un usuario puede tener varios niveles (por cada idioma), pero un nivel
     * sólo pertenece a un usuario
     */
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * La selectRaw sobreescribe el select por defecto, de manera que no obtenemos 
     * todos los campos en la select. Sobreescribiendo newQuery los recuperamos 
     * */
    public function newQuery()
    {
        return parent::newQuery()->select('levels.*');
    }
}
