# Listado de funciones API

**GET /api/info/general**

Devuelve información sobre la aplicación en formato JSON.

- *Alias*: general.
- *Parámetros*: Ninguno.
- *Requerimientos*: Ninguno.
- *Respuesta*: JSON con información general estadística de la aplicación.

<center>

| Parámetro                         |  Descripción  |
| :----------:                      | :------------                   |
| users.number                      | Número de usuarios              |
| users.connected                   | Número de jugadores conectados  |
| users.nacionalities               | Número de nacionalidades        |
| supported_languages.languages     | Array con el nombre del idioma soportado  |
| supported_languages.number        | Número de lenguajes soportados  |
| games.playing                     | Número de partidas en juego |
| statistics                               | Array de arrays con las estadísticas generales por idioma |
| statistics.most_valuable_word        | Palabra de más valor para el idioma lan. *statistics['es'].most_valuable_word* |
| statistics.most_valuable_word_points | Puntuación de la palabra de más valor para el idioma lan. Por ejemplo *statistics['es'].most_valuable_word_points* |


</center>

**GET  /api/info/currentgames/{number}**

Devuelve información resumida sobre las {number} partidas más recientes.

- *Alias*: current_games.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| number        | Opcional    | Número máximo de partidas devueltas. Por defecto: 5  |  

</center>

- *Requerimientos*: Ninguno.
- *Respuesta*: JSON con información sobre las partida en juego.

<center>

| Parámetro              |  Descripción  |
| :----------:           | :------------                   |
| language               | Idioma de la partida       |
| state                  | unstarted (sin empezar),turn_p1 (turno jugador 1), turn_p2 (turno jugador 2),win_p1 (gana jugador 1),win_p2 (gana jugador 2) |
| player_1_score         | Puntuación jugador 1      |
| player_2_score         | Puntuación jugador 2      |
| updated_at             | Hora ultima actualización |
| player1.id             | Identificador del jugador 1 |
| player1.name           | Nombre del jugador 1 |
| player1.avatar         | URL del avatar del jugador 1 |
| player1.country        | País del jugador 1 |
| player2.id             | Identificador del jugador 2 |
| player2.name           | Nombre del jugador 2 |
| player2.avatar         | URL del avatar del jugador 2 |
| player2.country        | País del jugador 2 |

</center>

**GET  /api/info/ranking/{lang}/{number}**

Devuelve el ranking de los {number} mejores jugadores en {lang}.

- *Alias*: ranking.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| number        | Opcional    | Número máximo de jugadores devueltas. Por defecto: 3  |  
| lang          | Obligatorio | Idioma para el que se solicita el ranking  |  

</center>

- *Requerimientos*: Ninguno.
- *Respuesta*: JSON con información sobre el ranking.

<center>

| Parámetro              |  Descripción                     |
| :----------:           | :------------                    |
| language_code          | Idioma en el que se tiene ese ranking |
| won                    | Partidas ganadas                 |
| lost                   | Partidas perdidas                |
| ratio                  | Tanto por 1 de porcentaje de victorias. |
| user.id                | Identificador del jugador        |
| user.name              | Nombre del jugador               |
| user.avatar            | URL del avatar del jugador       |
| user.country           | País del jugador                 |

</center>

**GET  /scrabble/search/user/live**

Devuelve una lista de usuarios cuyo nombre (_name_) coincida con la plantilla pasada.

- *Alias*: search_user.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| name          | Obligatorio | Letras que componen el nombre a buscar  |  

</center>

- *Requerimientos*: Usuario autenticado.
- *Respuesta*: JSON con un array con los usuarios que coinciden con esa plantilla.

<center>

| Parámetro              |  Descripción                     |
| :----------:           | :------------                    |
| user.id                | Identificador del jugador        |
| user.name              | Nombre del jugador               |
| user.email             | Email del jugador                |
| user.avatar            | URL del avatar del jugador       |
| user.country           | País del jugador                 |

</center>

- *Ejemplo*: se pasa como parametro name: _an_ y devuelve todos aquellos usuarios cuyo nombre tenga en algún lugar las letras an: "ANtonio", "romAN", "sANdra"....