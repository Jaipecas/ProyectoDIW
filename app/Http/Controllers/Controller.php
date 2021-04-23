<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * @OA\Info(
 *   title="Scrabble API",
 *   version="1.0.0",
 *   description="API para jugar al Scrabble"
 * )
 *
 * @OA\Schema(
 *   schema="json_ajax_response",
 *   required = { "data", "status", "statusText" },
 *   @OA\Xml(name = "json_ajax_response"),
 *   @OA\Property(property = "status", type = "integer",
 *      example = 200,
 *      description = "Código numérico del estado HTTP 1XX, 2XX, 3XX, 4XX, 5XX"
 *   ),
 *   @OA\Property(property = "statusText", type = "string",
 *      example = "OK",
 *      description = "Descripción del estado de la respuesta HTTP"
 *   ),
 *   @OA\Property(property = "data", type = "string",
 *      example = "Elemento introducido en la BBDD",
 *      description = "Información sobre la respuesta"
 *   ),
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
