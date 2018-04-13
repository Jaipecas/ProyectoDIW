<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
     // nombre de la tabla (no haría falta porque se define con el mismo nombre del modelo)
     protected $table = "notifications";

    /**
     * Relación con User. Un usuario puede tener muchas notificaciones, pero una notificación
     * sólo pertenece a un usuario
     */
    public function user() {
        return $this->belongsTo('/App/User', 'recipient');
    }
}
