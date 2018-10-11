# Listado de funciones API REST

## game

**POST /game/{id}/giveup**

Abandona la partida con identificador {id}

- *Alias*: giveup.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| id            | Obligatorio | Identificador de la partida a abandonar   |  

</center>

- *Requerimientos*: Usuario autenticado.
- *Respuesta*: Si no se tienen permisos para acceder a la partida, 403 'Access denied to the game'; si la partida ya está finalizada, 409 Game already finished. En caso contrario 200 'Game left'.

## user

**POST /upload/avatar**

Sube una imagen como avatar del usuario.

- *Alias*: avatar.
- *Parámetros*: Ninguno.
- *Requerimientos*: Usuario autenticado.
- *Respuesta*: JSON con los parámetros indicados en la tabla. 

<center>

| Parámetro       | Descripción       |
| :----------:    | :------------     |
| path            | URL de la ubicación del avatar |  

</center>

**POST /user/avatar/remove**

Elimina el avatar del usuario, quita el que hubiera son poner otro.

- *Alias*: remove_avatar.
- *Parámetros*: Ninguno.
- *Requerimientos*: Usuario autenticado.
- *Respuesta*: Si el fichero del avatar no se ha encontrado, 409 'File does not exists'. En caso contrario 200 'Avatar removed'.

**GET /user/remove**

Elimina la cuenta de usuario.

- *Alias*: remove_user.
- *Parámetros*: Ninguno.
- *Requerimientos*: Usuario autenticado.
- *Respuesta*: Si el fichero del avatar no se ha encontrado, 500 'User can\'t be removed'. En caso contrario 200 'User removed'. 

> Atencion: es responsabilidad de cliente redirigir al usuario fuera de la página que ha solicitadola eliminación del usuario.

**GET /user/statistics**

Devuelve las estadísticas del usuario en todos los idiomas que haya jugado.

- *Alias*: statistics.
- *Parámetros*: Ninguno.
- *Requerimientos*: Usuario autenticado.
- *Respuesta*: 

<center>

| Parámetro       | Tipo              | Descripción       |
| :----------     | :-------          | :------------     |
| data            | Array de JSON     | Array de n entradas, una por cada idioma al que haya jugado el usuario |
| data.language_code    | Cadena            | Código del idioma para el que se refleja la estadística |
| data.level            | Número            | Nivel del usuario en ese idioma |
| data.won              | Número            | Número de partidas ganadas en ese idioma |
| data.lost             | Número            | Número de partidas perdidas en ese idioma |
    
</center>

**GET /user/games/{gamesperpage?}**

Devuelve de manera paginada y de más reciente a más antigua, todaslas partidas jugadas por el jugador

- *Alias*: ser_games.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| gamesperpage  | Opcional    | Número de partidas en cada página   |  

</center>


- *Requerimientos*: Usuario autenticado.
- *Respuesta*: 

<center>

| Parámetro       | Tipo              | Descripción       |
| :----------     | :-------          | :------------     |
| current_page    | Número     | Página mostrada |
| first_page_url  | Cadena     | URL de la primera página  |
| last_page       | Número     | Número total del páginas |
| last_page_url   | Cadena     | URL de la última página  |
| next_page_url   | Cadena     | URL de la siguiente página  |
| prev_page_url   | Cadena     | URL de la página anterior  |
| data            | Array de JSON     | cada una de las partidas de esa página |
| data.language   | Cadena            | Idioma de la partida       |
| data.state      | Cadena            | unstarted (sin empezar),turn_p1 (turno jugador 1), turn_p2 (turno jugador 2),win_p1 (gana jugador 1),win_p2 (gana jugador 2) |
| data.player_1_score  | Número        | Puntuación jugador 1      |
| data.player_2_score  | Número        | Puntuación jugador 2      |
| data.updated_at      | Fecha         | Hora ultima actualización |
| data.player1.id      | Número        | Identificador del jugador 1 |
| data.player1.name    | Cadena        | Nombre del jugador 1 |
| data.player1.avatar  | Cadena        | URL del avatar del jugador 1 |
| data.player1.country | Cadena        | País del jugador 1 |
| data.player2.id      | Número        | Identificador del jugador 2 |
| data.player2.name    | Cadena        | Nombre del jugador 2 |
| data.player2.avatar  | Cadena        | URL del avatar del jugador 2 |
| data.player2.country | Cadena        | País del jugador 2 |
    
</center>

> Atencion: la llamada al resto de páginas se realiza utilizando las rutas indicadas en el JSON
