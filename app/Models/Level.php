<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Level extends Model
{
    protected $table = "levels";
    protected $primaryKey = "user_id";
    public $timestamps = false;

    /**
     *  Necesaria para poder realizar modificaciones con update y save en tablas con laves primarias compuestas
     *  https://blog.maqe.com/solved-eloquent-doesnt-support-composite-primary-keys-62b740120f
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query->where('user_id', '=', $this->getAttribute('user_id'))
              ->where('language_code', '=', $this->getAttribute('language_code'));

        return $query;
    }

    /**
     * Relación con User. Un usuario puede tener varios niveles (por cada idioma), pero un nivel
     * sólo pertenece a un usuario
     */
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * La selectRaw sobreescribe el select por defecto, de manera que no obtenemos 
     * todos los campos en la select. Sobreescribiendo newQuery los recuperamos 
     * https://theokouzelis.com/php/laravel-eloquent-calculated-fields.html
     * */
    public function newQuery()
    {
        return parent::newQuery()->select('levels.*');
    }
}
