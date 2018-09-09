<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = "levels";

    /**
     * Relación con User. Un usuario puede tener varios niveles (por cada idioma), pero un nivel
     * sólo pertenece a un usuario
     */
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
