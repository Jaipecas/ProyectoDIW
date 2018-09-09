<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * Existen ciertas funciones en Laravel que permiten la asignacion de variables del 
     * modelo de golpe. Esas funciones son create(), new(), firstOrNew() y firstOrCreate().
     * Si no indico lo contrario, cualquier variable del modelo se puede modificar únicamente
     * metiendola como valor dentro de un array que se pasa como parámetro a estas funciones.
     * Esta acción es muy habitual en formularios, donde recoges todos los datos del usuario 
     * vía post y creas una tupla con esos valores. Pero puede ser que nos interese no 
     * permitir algún dato trabaje así, por ejemplo is_admin. Si dejaramos libertad, se podria 
     * modificar a mano la petición post y dar acceso de admin a alguien que no debería.
     * 
     * guarded es parecido pero con la funcionalidad inversa. Es mejor no usarlo ya que 
     * es propenso a cometer errores por olvidos
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * Estos atributos no son devueltos por el sistema ante una petición de datos
     * 
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     /**
     * Relación con Player. Un usuario puede ser el jugador 1 en muchas partidas, pero 
     * una partida sólo tiene un jugador 1
     */
    public function player1Games() {
        return $this->hasMany('App\Game', 'player_1');
    }

    /**
     * Relación con Player. Un usuario puede ser el jugador 2 en muchas partidas, pero 
     * una partida sólo tiene un jugador 2
     */
    public function player2Games() {
        return $this->hasMany('App\Game', 'player_2');
    }

    /**
     * Relación con Challenge. Un usuario puede ser el jugador que pida el reto en muchos retos
     * Devuelve los retos en los que el usuario es el retador
     */
    public function requestChallenges() {
        return $this->hasMany('App\Challenge', 'requesting_player');
    }

    /**
     * Relación con Challenge. Un usuario puede ser el jugador que acepte el reto en muchos retos
     * Devuelve los retos en los que el usuario es el oponente
     */
    public function opponentChallenges() {
        return $this->hasMany('App\Challenge', 'opposing_player');
    }

    /**
     * Relación con Language. Un usuario tiene un idioma por defecto, pero un idioma puede ser 
     * asignado a muchos jugadores
     */
    public function favouriteLanguage() {
        return $this->belongsTo('App\Language', 'favourite_language');
    }

    /**
     * Relación con Notification. Un usuario puede tener muchas notificaciones, pero 
     * una notificación sólo pertenece a un usuario
     */
    public function notifications() {
        return $this->hasMany('App\Notification', 'recipient');
    }

    /**
     * Relación con Notification. Devuelve las notificaciones no leidas ordenadas de 
     * más antigua a más moderna
     */
    public function unreadNotifications() {
        return $this->hasMany('App\Notification', 'recipient')
                ->where("state","unread")->orderBy('updated_at');
    }

    /**
     * Relación con Language a través de Level. Un usuario puede jugar en varios idiomas y en 
     * cada idioma tener un nivel
     */
    public function languages() {
        // el segundo parámetro es opcional y es el nombre de la tabla pivot, en caso de que no tenga
        // el nombre por defecto (las dos tablas unidas por _ ordenadas en alfabéticamente)
        // el tercer parámetro es la clave en la tabla de este modelo (User) y el último
        // la clave del otro modelo
        return $this->belongsToMany('App\Language', 'levels', 'user_id','language_code');
    }

     /**
     * Relación con Notification. Un usuario puede tener muchas niveles (por cada idioma), pero 
     * una nivel sólo pertenece a un usuario
     */
    public function levels() {
        return $this->hasMany('App\Level', 'user_id');
    }
}
