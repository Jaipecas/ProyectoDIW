<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = "supported_languages";

    /**
     * Relación con Challenge. Un reto tiene un idioma, pero un idioma puede ser 
     * asignado a mucho retos
     */
    public function challenges() {
        // se le indica el modelo y, opcionalmente, la clave externa (la de challenge) en
        // el caso de que no sea language_id y la clave local (en el caso de que no sea id)
        return $this->hasMany('App\Challenge', 'language', 'language');
    }

    /**
     * Relación con User. Un usuario tiene un idioma por defecto, pero un idioma puede ser 
     * asignado a muchos jugadores
     */
    public function users() {
        return $this->hasMany('App\User', 'favourite_language', 'language');
    }

    /**
     * Relación con Game. Una partida tiene un idioma, pero un idioma puede estar 
     * asignado a muchas partidas 
     */
    public function games() {
        return $this->hasMany('App\Game', 'language', 'language');
    }

     /**
     * Relación con Language a través de Level. Un usuario puede jugar en varios idiomas y en 
     * cada idioma tener un nivel
     */
    public function levels() {
        return $this->belongsToMany('App\User', 'levels', 'language_code', 'user_id');
    }

}
