# Listado de variables disponibles en las plantillas *blade*

Este documento muestra las variables disponibles en las diferentes plantillas blade de la aplicación.

Se indica el nombre de la variable y su significado. En caso de ser un array o una colección, se indica los diferentes items de la colección unidos por un punto a la misma junto con su significado. Por ejemplo, _errors.email_. 

Existen dos lugares de procedencia de las variables:

* la sesión. La sesión es un fichero que se almacena en el servidor con información del usuario, fichero que únicamente está activo hasta que el usuario haga un logout o le caduque el tiempo de conexión. La información almacenada en él se puede obtener desde blade haciendo uso del helper _session_, indicando como parámetro el nombre de la variable a recuperar, por ejemplo _session('status')_.

* el propio servidor. Para usarlas simplemente se prefija con $ el nombre de la variable y se hace uso de ella, por ejemplo _$errors->first('password')_.

## Acceso a datos de colecciones

Muchas de las variables proporcionadas son de tipo _colección_. Para el acceso a sus valores, Laravel proporciona muchas funciones referenciadas en [la documentación](https://laravel.com/docs/5.6/collections#available-methods). Sin embargo, para el contexto en el que nos encontramos, las más habituales son:
* [all](https://laravel.com/docs/5.6/collections#method-all): devuelve una array con todos los datos de la colección. 
* [has](https://laravel.com/docs/5.6/collections#method-has): indica si un elemento dado existe o no en la colección.
* [count](https://laravel.com/docs/5.6/collections#method-count): devuelve el número de elementos en la colección.
* [first](https://laravel.com/docs/5.6/collections#method-first): devuelve el primer elemento de la colección. Se puede parametrizar para obtener el primer valor de un item de la colección, por ejemplo: _$error->first('item')_
* [get](https://laravel.com/docs/5.6/collections#method-get): devuelve un item en función de la clave o null si la clave no existe.

## prn_index, prn_extra[0..4], scr_index

| Parámetro         | Tipo             | Descripción        |
| :----------       | :-------         | :------------      |
| numberUsers       | Número           | Número de usuarios |
| connectedUsers    | Número           | Número de usuarios conectados |
| nacionalities     | Número           | Número de diferentes nacionalidades |
| languages         | Array            | Array de idiomas soportados |
| languages.name    | Cadena           | Nombre del idioma (p.e. $languages[0]->name ) |
| playingGames      | Número           | Número de partidas en juego |

## register

| Parámetro         | Tipo                     | Descripción       |
| :----------       | :-------                 | :------------     |
| errors            | Colección de colecciones | Colección de errores |
| errors.name       | Colección de cadenas     | Colección de errores relativos al campo *name* |  
| errors.email      | Colección de cadenas     | Colección de errores relativos al campo *email* |  
| errors.password   | Colección de cadenas     | Colección de errores relativos al campo *password* |  
| errors.country    | Colección de cadenas     | Colección de errores relativos al campo *country* |  
| errors.favourite_language | Colección de cadenas    | Array de errores relativos al campo *favourite_language* | 
| languages         | Array            | Array de idiomas soportados |
| languages.name    | Cadena           | Nombre del idioma (p.e. $languages[0]->name ) |


## login

| Parámetro       | Tipo                       | Descripción       |
| :----------     | :-------                   | :------------     |
| errors          | Colección de colecciones   | Colección de errores |
| errors.email    | Colección de cadenas | Colección de errores relativos al campo *email* | 

## email

| Parámetro          | Tipo                     | Descripción       |
| :----------        | :-------                 | :------------     |
| errors             | Colección de colecciones | Colección de errores |
| error.email        | Colección de cadenas  | Colección de errores relativos al campo _email_ |  
| session()          |                       | Información asociada a la sesión del usuario |
| session('status')  | Cadena                | Información sobre el estado de la petición |

## reset

| Parámetro          | Tipo              | Descripción       |
| :----------        | :-------          | :------------     |
| token              | Cadena            | token único correspondiente a la solicitud del usuario de reinicio de contraseña |
| errors             | Colección de colecciones | Colección de errores |
| errors.email       | Colección de cadenas     | Colección de errores relativos al campo _email_ |  
| errors.password    | Colección de cadenas     | Colección de errores relativos al campo _password_ |  

## block_auth

| Parámetro         | Tipo                     | Descripción       |
| :----------       | :-------                 | :------------     |
| errors            | Colección de colecciones | Colección de errores |
| errors.name       | Colección de cadenas     | Colección de errores relativos al campo *name* |  
| errors.email_reg      | Colección de cadenas     | Colección de errores relativos al campo *email_reg* |  
| errors.password_reg   | Colección de cadenas     | Colección de errores relativos al campo *password_reg* |  
| errors.country    | Colección de cadenas     | Colección de errores relativos al campo *country* |  
| errors.favourite_language | Colección de cadenas    | Array de errores relativos al campo *favourite_language* | 
| errors.email_log    | Colección de cadenas | Colección de errores relativos al campo *email_log* | 
| error.email_email        | Colección de cadenas  | Colección de errores relativos al campo _email_ |  
| session()          |                       | Información asociada a la sesión del usuario |
| session('status')  | Cadena                | Información sobre el estado de la petición |
| languages         | Array            | Array de idiomas soportados |
| languages.name    | Cadena           | Nombre del idioma (p.e. $languages[0]->name ) |


> **Nota**: En caso de error en la peticion (de login, registro o solicitud de renovación de contraseña), Laravel renderizá la misma página que generó la llamada. En ete caso es necesario aportar cierta información para saber cual de los tres aparatados es el que generó el error y poder mostrarlo correctamente. Para eso la opción más interesante es la creación de un campo oculto en cada uno de los formularios (el nombre siempre ha de ser el mismo, por ejemplo, _sector_), que tome como valor por defecto el nombre del apartado/formulario. En la posterior carga debida al error, se puede utilizar la función _old('sector')_ para conocer quien generó el error y por tanto que debe visualizase.

## scr_home

| Parámetro          | Tipo              | Descripción       |
| :----------        | :-------          | :------------     |
| user               | JSON              | Información del usuario autenticado | 
| user.id            | Número            | Identificador del usuario |
| user.name          | Cadena            | Login del usuario |
| user.email         | Cadena            | Correo electrónico del usuario | 
| user.type          | Cadena            | Tipo de usuario: admin, player | 
| user.state         | Cadena            | Estado del usuario: disable, offline, online |
| user.country       | Cadena            | País del usuario |
| user.created_at    | Cadena            | Fecha y hora de la última actualización |
| user.favourite_language | Cadena       | Idioma favorito del usuario |
| user.avatar        | Cadena            | URL del avatar del usuario |
| statistics         | Colección         | Colección de datos sobre estadísticas en función del idioma |
| statistics.language_code | Cadena      | Código del idioma al que pertenece la estadística |
| statistics.level   | Número            | Nivel del jugador en ese idioma |
| statistics.won     | Número            | Número de partidas ganadas en ese idioma  |
| statistics.lost    | Número            | Número de partidas perdidas en ese idioma |
| statistics.most_valuable_word       | Cadena      | Palabra más valiosa |
| statistics.most_valuable_word_points| Número      | Puntos de la palabra más valiosa |
| statistics.most_valuable_word_game  | Número      | Identificador de la partida donde está ña palabra de más valor |
| statistics.shortest_game            | Número      | Identificador de la partida más corta |
| statistics.longest_game             | Número      | Identificador de la partida más larga |
| notifications      | Colección         | Colección notificación no leídas por el usuario |
| notifications.id   | Número            | Identificador de la notificación |
| notifications.update_at  | Fecha       | Fecha de la actualización de la notificación |
| notifications.type  | Cadena           | Tipo de la actualización: warning, info, important |
| notifications.notification | Cadena    | Texto de la notificación |
| games              | Colección         | Colección de partidas en juego del usuario |
| games.id           | Número            | Identificador de la partida |
| games.updated_at.date  | Fecha         | Fecha de la última jugada   |
| games.language     | Cadena            | Idioma de la partida  |
| games.opponent.id  | Número            | Identificador del oponente |
| games.opponent.name | Cadena           | Nombre del oponente  |
| games.opponent.avatar | Cadena         | URL del avatar del oponente  |
| games.player_score | Número            | Puntuación del jugador  |
| games.opponent_score | Número          | Puntuación del oponente |
| games.state        | Cadena            | Estado de la partida: 0: por confirmar, 1: tira el jugador, 2: tira el oponente |
| usualopponents     | Array             | Array con los 3 oponentes más habituales |
| usualopponents.player | Número         | Identificador del oponente |
| usualopponents.total  | Número         | Número de veces con las que ha jugado |
| usualopponents.name  | String          | Nombre del oponente |
| usualopponents.avatar| String          | URL del avatar del oponente |
| usualopponents.level | Array           | Nivel del oponete por idioma. Por ejemplo level['es'] nivel del oponente en español |
| challenges         | Array             | Array con los retos pendientes del jugador |
| challenges.id      | Número            | Identificador del reto |
| challenges.created_at  | Fecha         | Fecha de creación del reto |
| challenges.language    | Cadena        | Idioma en el que se quiere jugar |
| challenges.level       | Número        | Nivel contra el que se quiere jugar: 0 = aleatorio, < 0 = nivel por debajo o igual del indicado (por ejemplo, -3 contra jugadores con nivel inferior o igual a 3) >=10 nivel por encima o igual del indicado (por ejemplo. 40, contra jugadores con un nivel >= a 4)|
| challenges.name        | Cadena        | Nombre del oponente que se quiere para el reto, En caso de que no se hay definido ninguno, NULL |


## scr_tableboard

| Parámetro          | Tipo              | Descripción       |
| :----------        | :-------          | :------------     |
| game               | JSON              | Información general de la partida |
| game.id            | Número            | Identificador de la partida | 
| game.created_at    | Fecha             | Fecha de creación de la partida    | | game.updated_at    | Fecha             | Fecha de última tirada  | 
| game.language      | Cadena            | Idioma de la partida |
| game.state         | Cadena            | Estado de la partida: *unstarted*, *turn_p1* (turno jugador 1), *turn_p2* (turno jugador2), *win_p1* (ganador jugador1), *win_p2* (ganador p2)|
| game.throw         | Cadena           | Listado de tiradas. Formato: PLLLWWWWWWWWWW\|PLLLWWWWWWWWW\|... P : jugador 1 o 2, L posicion: 06D, J11. Si el número va delante será vertical y si va la letra será horizontal, W palabra. Cada palabra separada por \| |
| game.tableboard    | Cadena           | cadena de 225 caracteres en la que en cada posición se incluye la letra correspondiente según la celda (ordenado de izq. a der. y de arriba a abajo) |
| game.remaining_tokens | Número        | Número de fichas por jugar |
| game.total_tokens  | Numero           | Número total de fichas en la partida |
| games              | Colección         | Colección de partidas en juego del usuario |
| games.id           | Número            | Identificador de la partida |
| games.updated_at.date  | Fecha         | Fecha de la última jugada   |
| games.language     | Cadena            | Idioma de la partida  |
| games.opponent.id  | Número            | Identificador del oponente |
| games.opponent.name | Cadena           | Nombre del oponente  |
| games.player_score | Número            | Puntuación del jugador  |
| games.opponent_score | Número          | Puntuación del oponente |
| games.state        | Cadena            | Estado de la partida: 0: por confirmar, 1: tira el jugador, 2: tira el oponente |
| user               | JSON   | Información de la partida del usuario |
| user.player        | Cadena | Identificación del usuario en la partida, *P1*: jugador 1, *P2*: jugador 2 |
| user.score        | Número  | Puntuación del jugador |
| user.tokens       | Cadena  | Fichas actuales del jugador. Formato LPPLPP... L letra y PP puntuación |
| user.avatar         | Cadena  | URL del avatar del usuario |
| opponent            | JSON   | Información de la partida del rival |
| opponent.player     | Cadena | Identificación del usuario en la partida, *P1*: jugador 1, *P2*: jugador 2 |
| opponent.score      | Número  | Puntuación del jugador |
| opponent.avatar     | Cadena  | URL del avatar del oponente |
        
        