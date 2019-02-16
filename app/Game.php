<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // nombre de la tabla (no haría falta porque se define con el mismo nombre del modelo)
    protected $table = "games";

    /**
     * Relación con User. Una partida sólo tiene un jugador 1, pero un jugador 
     * puede ser jugador 1 en muchas patidas
     */
    public function player1() {
        return $this->belongsTo('App\User', 'player_1');
    }

    /**
     * Relación con User. Una partida sólo tiene un jugador 2, pero un jugador 
     * puede ser jugador 2 en muchas patidas
     */
    public function player2() {
        return $this->belongsTo('App\User', 'player_2');
    }

    /**
     * Relación con Language. Una partida sólo puede tener un lenguaje asociado, pero un idioma
     * puede estar asociado a muchas partidas
     */
    public function language() {
        return $this->belongsTo('App\Language', 'language');
    }

    /**
     * Devuelve un vector con todas las fichas iniciales
     */
    public static function initalLetters($lan) {

        $letters = [];
    
        $lettersOri = config('game.letters');
        $lettersOriL = $lettersOri[$lan];
        foreach ($lettersOriL as $let => $data) {    
            for ($i=0; $i<$data['quantity']; $i++)
                $letters[] = $let; 
        }
    
        shuffle ($letters);
        return implode("",$letters);
    }

    /**  
     * Saca una ficha del saco de fichas
     * Si no quedan fichas devuelve cadena vacia
     */
    public function getLetterFromBag() {
        if (strlen($this->remaining_letters) == 0)
            return "";

        $pos = rand(0, strlen($this->remaining_letters)-1);
        $letter = $this->remaining_letters[$pos];
        $this->remaining_letters = substr_replace($this->remaining_letters, '', $pos, 1);
        
        return $letter;
    }
    
}
