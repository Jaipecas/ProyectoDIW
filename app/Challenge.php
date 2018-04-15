<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    // nombre de la tabla (no haría falta porque se define con el mismo nombre del modelo)
    protected $table = "challenges";

    /**
     * Relación con Language. Un reto tiene un idioma, pero un idioma puede ser 
     * asignado a mucho retos
     */
    public function language() {
        // se le indica el modelo y, opcionalmente, la clave externa que se utiliza
        // en el caso de que no sea language_id (nombre del metodo + _id) y 
        // la clave primaria del padre (language) en el caso de que no sea id
        return $this->belongsTo('App\Language', 'language', 'language');
    }

    /**
     * Relación con User peticionario. Un reto sólo tiene un jugador retador, pero un jugador 
     * puede ser retador en muchos retos
     */
    public function requestPlayer() {
        return $this->belongsTo('App\User', 'requesting_player');
    }

    /**
     * Relación con User oponente. Un reto sólo tiene un jugador oponente, pero un jugador 
     * puede ser oponente en muchos retos
     */
    public function opponentPlayer() {
        return $this->belongsTo('App\User', 'opposing_player');
    }
}
