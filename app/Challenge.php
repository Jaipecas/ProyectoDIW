<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\AcceptedChallenge;

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

    /** 
     * Empareja retos 
     * */
    public static function pairChallenges($inputChallenge) {

        $request = $inputChallenge->requestPlayer()->get(['id']);
        $levelRequest = Level::firstOrCreate(['user_id' => $request->first()->id],['language_code' => $inputChallenge->language])->level;

        if ($inputChallenge->level == "0" && $inputChallenge->opposing_player == NULL) { // aleatorio
            
            unset($levels);
           // dd($levelRequest);
            $levels = array(0, $levelRequest);

            for ($i = 5;$i >= $levelRequest;$i = $i-1) { array_push($levels, -1*$i); }
            for ($i = 10;$i <= 10*$levelRequest;$i = $i+10) { array_push($levels, $i); }

            $oppoChallenge = Challenge::where('language', $inputChallenge->language)
                    ->whereIn('level', $levels)
                    ->where('opposing_player', NULL)        // me aseguro de que no quiera jugar contra alguien en concreto
                    ->where('id', '<>', $inputChallenge->id)
                    ->orderBy('created_at','asc')->first();

            if ($oppoChallenge) {
                // emito el evento
                event(new AcceptedChallenge(234,"mm","jj"));
            }

        } else if ($inputChallenge->level != "0"&& $inputChallenge->opposing_player = NULL) { // nivel
        

        } else {


        }

    
    }
}
