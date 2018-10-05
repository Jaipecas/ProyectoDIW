# Listado de funciones API REST

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