# Listado de funciones API REST

## challenge

**POST /scrabble/challenge/request/{lang}**

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

**POST /scrabble/challenge/request/{lang}/against/{id}**

Solicita una partida contra el usuario cuyo identificador es id

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

**POST /scrabble/challenge/request/{lang}/level/{level}**

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

**POST /scrabble/game/{id}/giveup**

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

**POST /game/{id}/user/throw**

Realiza una tirada

- *Alias*: throw. 
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| id            | Obligatorio | Identificador de la partida   |  
| word          | Obligatorio | Letras en orden enviadas. No se incluyen las posibles letras ya existentes en el tablero en las que el jugador se apoya para completar la palabra. Por ejemplo, si quiere formar CASA, apoyándose en una S de tablero enviará CAA. La letras se envían en mayúsculas salvo las especiales de cada alfabeto, por ejemplo las dobles como la LL, que se codifican utilizando una letrea minúscula. Las correspondencias entre letras especiales y códigos por idiomas se pueden encontrar en el fichero _scrabble_helper_library.js_, en las funciones _getCode/getLetter_  |
| row           | Obligatorio | Fila de la primera letra de _word_ |
| column        | Obligatorio | Columna de la primera letra de _word_ |
| direction     | Obligatorio | H, horizontal, V: vertical  |
              
</center>

- *Requerimientos*: Usuario autenticado y participante en la partida.
- *Respuesta*: JSON con los parámetros indicados en la tabla. 

<center>

| Parámetro       | Descripción       |
| :----------:    | :------------     |
| rword           | Palabra utilizada para el conteo de puntos (tiene en cuenta letras que ya estuvieran en el tablero) |  
| oword           | Palabra enviada por el jugador |  
| irow            | Fila (A-O) de la primera letra de la palabra (tiene en cuenta letras que ya estuvieran en el tablero) |  
| icol            | Columna (1-15) de la primera letra de la palabra (tiene en cuenta letras que ya estuvieran en el tablero)  |  
| frow            | Fila (A-O) de la última letra de la palabra (tiene en cuenta letras que ya estuvieran en el tablero) |  
| fcol            | Columna (1-15) de la última letra de la palabra (tiene en cuenta letras que ya estuvieran en el tablero)  |  
| tokens          | Array con todas las letras de las que dispondrá el jugador en la siguiente tirada |  
| tokens.letter   | Letra de la ficha |  
| tokens.value    | Puntos de la ficha |  
| newtokens       | Array con las nuevas letras asignadas |  
| newtokens.letter   | Letra de la ficha |  
| newtokens.value    | Puntos de la ficha |  
| wscore          | Puntuación ganada por la palabra |  
| pscore          | Nueva puntuación total del contrincante |  
| state           | Estado de la partida: *turn_p1*, *turn_p2*, *win_p1*, *win_p2* |  
| pstate          | Estado del contrincante: _play_ (ha jugado) |
                                
</center>

 **POST /game/{id}/user/pass**

Pasa el turno

- *Alias*: pass_turn.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| id            | Obligatorio | Idecntificador de la partida a abandonar   |  

</center>

- *Requerimientos*: Usuario autenticado y participante en la partida.
- *Respuesta*: JSON con los parámetros indicados en la tabla. 

<center>

| Parámetro       | Descripción       |
| :----------:    | :------------     |
| pscore          | Nueva puntuación total del contrincante |  
| state           | Estado de la partida: *turn_p1*, *turn_p2*, *win_p1*, *win_p2* |  
| pstate          | Estado del contrincante: _pass_ (ha pasado) | 
                               
</center>

**POST /game/{id}/user/return**

Devuelve fichas al servidor

- *Alias*: return_tokens.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| id            | Obligatorio | Identificador de la partida a abandonar   | 
| tokens        | Obligatorio | Array con los códigos de letras devueltas, por ejemplo _"A","r","T","c"_ devuelve la A RR T CH)  | 

</center>

- *Requerimientos*: Usuario autenticado y participante en la partida.
- *Respuesta*: JSON con los parámetros indicados en la tabla. 

<center>

| Parámetro       | Descripción       |
| :----------:    | :------------     |
| pscore          | Nueva puntuación total del contrincante |  
| state           | Estado de la partida: *turn_p1*, *turn_p2*, *win_p1*, *win_p2* |  
| pstate          | Estado del contrincante: _return_ (ha devuelto fichas) | 
                               
</center>


## notifications

**PUT /scrabble/notification/{id}/update/{state}**

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

**POST /scrabble/upload/avatar**

Sube una imagen como avatar del usuario.

- *Alias*: avatar.
- *Parámetros*: 

<center>

| Parámetro       | Descripción       |
| :----------:    | :------------     |
| formData        | Objeto formData con clave el nombre del campo, el fichero y el nombre del fichero. Por ejemplo: formData.append("avatar",file, file.name). Se puede ver un ejemplo en el fichero _UploadImageComponent.vue_ |  

</center>

- *Requerimientos*: Usuario autenticado.
- *Respuesta*: JSON con los parámetros indicados en la tabla. 

<center>

| Parámetro       | Descripción       |
| :----------:    | :------------     |
| path            | URL de la ubicación del avatar |  

</center>

**POST /scrabble/user/avatar/remove**

Elimina el avatar del usuario, quita el que hubiera son poner otro.

- *Alias*: remove_avatar.
- *Parámetros*: Ninguno.
- *Requerimientos*: Usuario autenticado.
- *Respuesta*: Si el fichero del avatar no se ha encontrado, 409 'File does not exists'. En caso contrario 200 'Avatar removed'.

**GET /scrabble/user/games/{gamesperpage?}**

Devuelve de manera paginada y de más reciente a más antigua, todas las partidas jugadas por el jugador

- *Alias*: user_games.
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
| current_page    | Número            | Página mostrada |
| first_page_url  | Cadena            | URL de la primera página  |
| last_page       | Número            | Número total del páginas |
| last_page_url   | Cadena            | URL de la última página  |
| next_page_url   | Cadena            | URL de la siguiente página  |
| prev_page_url   | Cadena            | URL de la página anterior  |
| data            | Array de JSON     | cada una de las partidas de esa página |
| data.language   | Cadena            | Idioma de la partida       |
| data.state      | Cadena            | unstarted (sin empezar),turn_p1 (turno jugador 1), turn_p2 (turno jugador 2),win_p1 (gana jugador 1),win_p2 (gana jugador 2) |
| data.player_1_score  | Número        | Puntuación jugador 1      |
| data.player_2_score  | Número        | Puntuación jugador 2      |
| data.updated_at      | Fecha         | Hora ultima actualización |
| data.id              | Número        | Identificador de la partida |
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

**PUT /scrabble/user/update**

Actuliza el perfil del usuario.

- *Alias*: user_update.
- *Parámetros*: JSON con los datos a actualizar.

<center>

| Parámetro                 |  Tipo       |  Descripción             |
| :----------:              | :-------:   | :------------            |
| name                      | Opcional    | Nuevo nombre             |  
| country                   | Opcional    | Nuevo país               |  
| favourite_language        | Opcional    | Nuevo lenguaje favorito  |  
| new_password              | Opcional    | Nueva contraseña         |  
| new_password_confirmation | Opcional    | Confirmación de nueva contraseña (obligatorio en el caso de indicar nueva contraseña) |  
| old_password              | Opcional    | Contraseña anterior (obligatorio en el caso de indicar nueva contraseña)  |  

</center>

- *Requerimientos*: Usuario autenticado.
- *Respuesta*: Si el usuario no se encuentra, 404 'User not found'; si el idioma no se encuentra, 409 'Language not supported'; si la contraseña es incorrecta, 401 'Password incorrect'; en caso de error de validación un mensaje 409 (conflict) con la descripción del error. En caso contrario 200 'User updated'. 

- *Comentarios*: en caso de cambiar la contraseña el servidor hace un logout y por lo tanto conviene volver a la página de login.

**GET /scrabble/user/remove**

Elimina la cuenta de usuario.

- *Alias*: remove_user.
- *Parámetros*: Ninguno.
- *Requerimientos*: Usuario autenticado.
- *Respuesta*: Si el fichero del avatar no se ha encontrado, 500 'User can\'t be removed'. En caso contrario 200 'User removed'. 

> Atencion: es responsabilidad de cliente redirigir al usuario fuera de la página que ha solicitadola eliminación del usuario.

**GET /scrabble/user/statistics**

Devuelve las estadísticas del usuario en todos los idiomas que haya jugado.

- *Alias*: statistics.
- *Parámetros*: Ninguno.
- *Requerimientos*: Usuario autenticado.
- *Respuesta*: 

<center>

| Parámetro       | Tipo              | Descripción       |
| :----------     | :-------          | :------------     |
| data            | Array de JSON     | Array de n entradas, una por cada idioma al que haya jugado el usuario |
| data.language_code        | Cadena      | Código del idioma para el que se refleja la estadística |
| data.level                | Número      | Nivel del usuario en ese idioma |
| data.won                  | Número      | Número de partidas ganadas en ese idioma |
| data.lost                 | Número      | Número de partidas perdidas en ese idioma |
| data.most_valuable_word       | Cadena      | Palabra más valiosa |
| data.most_valuable_word_points| Número      | Puntos de la palabra más valiosa |
| data.most_valuable_word_game  | Número      | Identificador de la partida donde está ña palabra de más valor |
| data.shortest_game            | Número      | Identificador de la partida más corta |
| data.longest_game             | Número      | Identificador de la partida más larga |
    
</center>



