<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = "supported_languages";
    protected $primaryKey = "language";

    /**
     * Relación con Challenge. Un reto tiene un idioma, pero un idioma puede ser 
     * asignado a mucho retos
     */
    public function challenges() {
        // se le indica el modelo y, opcionalmente, la clave externa (la de challenge) en
        // el caso de que no sea language_id y la clave local (en el caso de que no sea id)
        return $this->hasMany('App\Models\Challenge', 'language', 'language');
    }

    /**
     * Relación con User. Un usuario tiene un idioma por defecto, pero un idioma puede ser 
     * asignado como favorito por muchos jugadores
     */
    public function usersAsFavourite() {
        return $this->hasMany('App\Models\User', 'favourite_language', 'language');
    }

    /**
     * Relación con Game. Una partida tiene un idioma, pero un idioma puede estar 
     * asignado a muchas partidas 
     */
    public function games() {
        return $this->hasMany('App\Models\Game', 'language', 'language');
    }

     /**
     * Relación con Language a través de Level. Devuelve los jugadores que juegan con ese idioma
     * Un usuario puede jugar en varios idiomas y en cada idioma tener un nivel
     */
    public function users() {
        return $this->belongsToMany('App\Models\User', 'levels', 'language_code', 'user_id');
    }

}
