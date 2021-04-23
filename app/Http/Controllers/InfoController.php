<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Level;
use App\Models\User;
use Carbon\Carbon;

class InfoController extends Controller
{
    protected $header = [
        "Content-Type" => "application/json; charset=UTF-8",
        "charset" => "utf-8",
    ];

    public static function generateGeneralInfo()
    {
        // numero de usuarios
        $numberUsers = \DB::table("users")
            ->where("state", "<>", "disable")
            ->where("type", "player")
            ->count();

        $connectedUsers = \DB::table("users")
            ->where("state", "<>", "online")
            ->where("type", "player")
            ->count();

        $nacionalities = \DB::table("users")
            ->select("country")
            ->distinct()
            ->count();

        $languages = \DB::table("supported_languages")
            ->select("name")
            ->get();

        $playingGames = \DB::table("games")
            ->where("state", "=", "turn_p1")
            ->orWhere("state", "=", "turn_p2")
            ->count();

        $statistics = InfoController::generalStatistics();

        return [
            "numberUsers" => $numberUsers,
            "connectedUsers" => $connectedUsers,
            "nacionalities" => $nacionalities,
            "languages" => $languages,
            "playingGames" => $playingGames,
            "generalStatistics" => $statistics,
        ];
    }

    // renderiza la página de información de scrabble
    public function index()
    {
        $data = $this->generateGeneralInfo();

        return view("scr_index", $data);
    }

    // Información general de la aplicación
    public function general()
    {
        $data = $this->generateGeneralInfo();

        return response()->json(
            [
                "users" => [
                    "number" => $data["numberUsers"],
                    "connected" => $data["connectedUsers"],
                    "nacionalities" => $data["nacionalities"],
                ],
                "supported_languages" => [
                    "languages" => $data["languages"],
                    "number" => count($data["languages"]),
                ],
                "games" => [
                    "playing" => $data["playingGames"],
                ],
                "statistics" => [$data["generalStatistics"]],
            ],
            200,
            $this->header,
            JSON_UNESCAPED_UNICODE,
        );
    }

    // Devuelve un array con las estadísticas generales por idioma
    protected static function generalStatistics()
    {
        $statCollection = \DB::table("statistics")->get();
        $statArray = [];

        foreach ($statCollection as $lan) {
            $statArray[$lan->language_code] = [];

            $statArray[$lan->language_code]["most_valuable_word"] =
                $lan->most_valuable_word;
            $statArray[$lan->language_code]["most_valuable_word_points"] =
                $lan->most_valuable_word_points;
        }
        return $statCollection;
    }

    /**
     * @OA\Schema(
     *   schema = "current_games",
     *   required = { "language", "state", "player_1_score",
     *            "player_2_score", "player1", "player2", "update_at" },
     *   @OA\Xml(name = "current_games"),
     *   @OA\Property(property = "language", type = "string",
     *      minLength = 2, maxLength = 2,
     *      example = "es", description = "Idioma de la partida",
     *   ),
     *   @OA\Property(property = "state", type = "string",
     *      example = "win_p2",
     *      description = "Estado de la partida unstarted (sin empezar), turn_p1 (turno jugador 1), turn_p2 (turno jugador 2), win_p1 (gana jugador 1), win_p2 (gana jugador 2)"
     *   ),
     *   @OA\Property(property = "updated_at", type = "string",
     *      format = "date-time", example = "2021-03-11T21:12:41.000000Z",
     *      description = "Fecha y hora de la última actualización"
     *   ),
     *   @OA\Property(property = "player_1_score", type = "integer",
     *      example = 37, minimum = 0,
     *      description = "Puntuación jugador 1"
     *   ),
     *   @OA\Property(property = "player_2_score", type = "integer",
     *      example = 121, minimum = 0,
     *      description = "Puntuación jugador 2"
     *   ),
     *   @OA\Property(property = "player1", type = "object",
     *      @OA\Property(property = "id", type = "integer",
     *        example = 34, description = "Identificador del jugador 1"
     *      ),
     *      @OA\Property(property = "name", type = "string",
     *        example = "Rafael Cardoso",
     *        description = "Nombre del jugador 1"
     *     ),
     *     @OA\Property(property = "avatar",
     *        type = "string",
     *        example = "/storage/avatars/PxGitAlRvrSpL8R92x52YcU3VqHH8c7RYVt9f7Ow.png",
     *        description = "URL del avatar del jugador 1"
     *     ),
     *     @OA\Property(property = "country", type = "string", example = "it",
     *        minLength = 2, maxLength = 2,
     *        description = "País del jugador 1"
     *     ),
     *   ),
     *   @OA\Property(property = "player2", type = "object",
     *      @OA\Property(property = "id", type = "integer",
     *        example = 48,
     *        description = "Identificador del jugador 2"
     *      ),
     *      @OA\Property(property = "name", type = "string",
     *        example = "Karl Aldrige",
     *        description = "Nombre del jugador 2"
     *     ),
     *     @OA\Property(property = "avatar", type = "string",
     *        example = "/storage/avatars/AxGitAKr59lRvrpL8R2x52cU3qHH8c7RYVt9f7Ow.png",
     *        description = "URL del avatar del jugador 2"
     *     ),
     *     @OA\Property(property = "country", type = "string", example = "uk",
     *        minLength = 2, maxLength = 2,
     *        description = "País del jugador 2"
     *     ),
     *   )
     * )
     *
     * @OA\Get(
     *   path = "/api/info/currentgames/{number}",
     *   summary = "Devuelve información resumida sobre las {number} partidas más recientes.",
     *   description = "Devuelve las últimas partidas jugadas",
     *   operationId = "current_games",
     *   tags = { "Info" },
     *   @OA\Parameter(in = "path",
     *     description = "Número máximo de partidas devueltas.",
     *     name = "number", required = true,
     *     @OA\Schema(type = "integer"),
     *   ),
     *   @OA\Response(
     *     response = 200, description = "Partidas más recientes",
     *     @OA\MediaType(
     *       mediaType = "application/json",
     *       @OA\Schema(ref = "#/components/schemas/current_games"),
     *     ),
     *   )
     * )
     *
     * @OA\Get(
     *   path="/api/info/currentgames",
     *   summary="Devuelve información resumida sobre las 5 partidas más recientes.",
     *   description="Devuelve las 5 últimas partidas jugadas",
     *   operationId="current_games",
     *   tags = { "Info" },
     *   @OA\Response(
     *     response=200, description="Partidas más recientes",
     *     @OA\MediaType(
     *       mediaType = "application/json",
     *       @OA\Schema(ref = "#/components/schemas/current_games"),
     *     ),
     *   )
     * )
     */
    public function currentGames($number = 5)
    {
        /* Devuelve todos las columnas de user */
        /*$games = Game::with(['player1','player2'])->orderBy('updated_at')->take($number)
         ->get(['language', 'state', 'player_1', 'player_1_score', 'player_2', 'player_2_score', 'updated_at'])->toArray();*/

        /* Devuelve sólo las columnas de user que me interesan */
        $games = Game::with([
            "player1" => function ($query) {
                //$query->select('id','name', 'avatar', 'country');
                $query->select(
                    \DB::raw(
                        "id, name, concat('/storage/',avatar) as avatar, country",
                    ),
                );
            },
            "player2" => function ($query) {
                //$query->select('id','name', 'avatar', 'country');
                $query->select(
                    \DB::raw(
                        "id, name, concat('/storage/',avatar) as avatar, country",
                    ),
                );
            },
        ])
            ->orderBy("updated_at")
            ->take($number)
            ->get([
                "language",
                "state",
                "player_1",
                "player_1_score",
                "player_2",
                "player_2_score",
                "updated_at",
            ])
            ->toArray();

        return response()->json(
            $games,
            200,
            $this->header,
            JSON_UNESCAPED_UNICODE,
        );
    }

    /**
     * Ranking por idioma de los mejores jugadores
     * lang: idioma
     * $number: número máximo de jugadores devueltos
     **/
    public function ranking($lang, $number = 3)
    {
        // compruebo si el lenguaje esta soportado
        $sup_langs = \DB::table("supported_languages")->get();

        if (!$sup_langs->contains("language", strtolower($lang))) {
            return response("Language not supported", 409);
        }

        $ranking = Level::selectRaw("won/(won+lost) AS ratio")
            ->where("language_code", $lang)
            ->with([
                "user" => function ($query) {
                    $query->select("id", "name", "avatar", "country");
                },
            ])
            ->orderBy("ratio", "desc")
            ->take($number)
            ->get();

        return response()->json(
            $ranking,
            200,
            $this->header,
            JSON_UNESCAPED_UNICODE,
        );
    }

    /**
     * Obtiene las 5 noticias no expiradas más próximas a la fecha actual
     * type -1: all, 0: info, 1: notice
     **/
    public function news($type = -1)
    {
        if ($type < -1 || $type > 1) {
            return response("Unknown news type", 404);
        }

        $now = Carbon::now()->format("Y-m-d");

        if ($type == -1) {
            $news = \DB::table("news")
                ->whereDate("expires_at", ">", $now)
                ->orderBy("expires_at")
                ->get()
                ->take(5);
        } else {
            $typeStr = $type == 0 ? "info" : "notice";
            $news = \DB::table("news")
                ->where("type", $typeStr)
                ->whereDate("expires_at", ">", $now)
                ->orderBy("expires_at")
                ->get()
                ->take(5);
        }

        return response()->json(
            $news,
            200,
            $this->header,
            JSON_UNESCAPED_UNICODE,
        );
    }

    /**
     * búsqueda de jugadores por patrón de nombre
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchUser(Request $request)
    {
        $name = $request->input("name");

        $users = User::where("name", "LIKE", "%" . $name . "%")->get([
            "id",
            "name",
            "email",
            "country",
            "avatar",
        ]);

        return response()->json(
            $users,
            200,
            $this->header,
            JSON_UNESCAPED_UNICODE,
        );
    }
}
