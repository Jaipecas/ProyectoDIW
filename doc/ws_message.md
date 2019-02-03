# Listado de mensajes enviados via Websocket por el servidor

## Canal user.{id}

Canal privado para cada usuario, donde id es el identificador del usuario

**AcceptedChallenge**

- *Descripción*: Un solicitud de partida ha sido aceptada.

*Información*

|  Parámetro   |  Descripción  |
| :----------  | :------------ |
| gameId       | Identificador de la partida creada |
| lang         | Idioma de la partida |
| oppoId       | Identificador del oponente |
| oppoId       | Identificador del oponente |
| oppoName     | Nombre del oponente
| oppoCountry  | País del oponente |
| oppoAvatar   | URL del avatar del oponente  |


## Canal game.{gid}.user.{id}

Canal privado para cada usuario, donde id es el identificador del usuario y gid el de la partida

**OpponentThrow**

- *Descripción*: El contrincante ha realizado una jugada.

*Información*

|  Parámetro    |  Descripción  |
| :----------   | :------------ |
| word          | Palabra colocada por el contrincante |
| wordScore     | Puntuación ganada por la palabra |
| playerScore   | Nueva puntuación total del contrincante |
| col           | Columna inicial de la palabra (1-15) |
| row           | Fila inicial de la palabra (A-O) |
| dir           | H horizontal, V vertical |
| numberRemainingTokens  | Número de pieza que quedan en la bolsa |
| state         | Estado de la partida: *turn_p1*, *turn_p2*, *win_p1*, *win_p2* |
| tableboard    | Nuevo tablero |
| playerState   | Estado del contrincante: _play_ (ha jugado), _pass_ (ha pasado) |
