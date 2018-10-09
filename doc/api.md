# Listado de funciones API

**GET /api/info/general**

Devuelve información sobre la aplicación en formato JSON.

- *Alias*: general.
- *Parámetros*: Ninguno.
- *Requerimientos*: Ninguno.
- *Respuesta*: JSON con información general estadística de la aplicación.

<center>

| Parámetro                     |  Descripción  |
| :----------:                  | :------------                   |
| users.number                  | Número de usuarios              |
| users.connected               | Número de jugadores conectados  |
| users.nacionalities           | Número de nacionalidades        |
| supported_languages.languages | Array con el nombre del idioma soportado  |
| supported_languages.number    | Número de lenguajes soportados  |

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