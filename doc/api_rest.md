# Listado de funciones API REST

## challenge

**POST /challenge/request/{lang}**

Solicita una partida aleatoria

- *Alias*: create_challenge.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| lang          | Obligatorio | Idioma de la partida  |  

</center>

- *Requerimientos*: Usuario autenticado.
- *Respuesta*: Si el idioma no está soportado 409 'Language not supported'. En caso contrario 200 'Challenge created'.

**POST /challenge/request/{lang}/against/{id}**

Solicita una partida contra el usario cuyo identificador es id

- *Alias*: create_challenge_user.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| lang          | Obligatorio | Idioma de la partida  |  
| id            | Obligatorio | Identificador del usuario que se quiere retar  |  

</center>

- *Requerimientos*: Usuario autenticado.
- *Respuesta*: Si el idioma no está soportado 409 'Language not supported'; si el id del contrincante no se localiza 404, 'Opposing player not found'. En caso contrario 200 'Challenge created'.

**POST /challenge/request/{lang}/level/{level}**

Solicita una partida contra un usuario cuyo nivel sea level

- *Alias*: create_challenge_level.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| lang          | Obligatorio | Idioma de la partida  |  
| level         | Obligatorio | Nivel al que se quiere jugar. Número (=), (-) <=, (*10) >=. Por ejemplo, -3 con niveles menores o iguales a 3 |  

</center>

- *Requerimientos*: Usuario autenticado.
- *Respuesta*: Si el idioma no está soportado 409 'Language not supported'; si el nivel es incorrecto 404, 'Level out of bounds'. En caso contrario 200 'Challenge created'.

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

- *Requerimientos*: Usuario autenticado y participante en la partida.
- *Respuesta*: Si no se tienen permisos para acceder a la partida, 403 'Access denied to the game'; si la partida ya está finalizada, 409 Game already finished. En caso contrario 200 'Game left'.

## notifications

**PUT /notification/{id}/update/{state}**

Modifica el estado de una notificación

- *Alias*: update_notification.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| id            | Obligatorio | Identificador de la notificación |  
| state         | Obligatorio | Nuevo estado. Puede ser: delete, read, unread |  

</center>

- *Requerimientos*: Usuario autenticado y dueño de la notificación.
- *Respuesta*: Si no se tienen permisos para acceder a la notificación, 403 'Access denied to notification'; si la notificación ya tiene el estado, 409 'Notification already' (state); si el estado no está soportado 406, 'State not valid'; si la notificación no se localiza 404, 'Notification player not found' En caso contrario 200 'Notification checked as' (state).

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
| data.language_code    | Cadena      | Código del idioma para el que se refleja la estadística |
| data.level            | Número      | Nivel del usuario en ese idioma |
| data.won              | Número      | Número de partidas ganadas en ese idioma |
| data.lost             | Número      | Número de partidas perdidas en ese idioma |
| data.internal_id      | Cadena      | Identificador de cada entrada del array |
    
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


