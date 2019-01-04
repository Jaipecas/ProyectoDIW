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

## scr_index

| Parámetro         | Tipo             | Descripción        |
| :----------       | :-------         | :------------      |
| numberUsers       | Número           | Número de usuarios |
| connectedUsers    | Número           | Número de usuarios conectados |
| nacionalities     | Número           | Número de diferentes nacionalidades |
| languages         | Array            | Array de idiomas soportados |
| languages.name    | Cadena           | Nombre del idioma (p.e. $languages[0]->name ) |

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
| statistics         | Colección         | Colección de datos sobre estadísticas en función del idioma |
| statistics.language_code | Cadena      | Código del idioma al que pertenece la estadística |
| statistics.level   | Número            | Nivel del jugador en ese idioma |
| statistics.won     | Número            | Número de partidas ganadas en ese idioma  |
| statistics.lost    | Número            | Número de partidas perdidas en ese idioma |
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
| games.player_score | Número            | Puntuación del jugador  |
| games.opponent_score | Número          | Puntuación del oponente |
| games.state        | Cadena            | Estado de la partida: 0: por confirmar, 1: tira el jugador, 2: tira el oponente |
                
               