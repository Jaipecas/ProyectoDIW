# API REST Scrabble

[![GPLv3 license](https://img.shields.io/badge/License-GPLv3-blue.svg)](http://perso.crans.org/besson/LICENSE.html)

## Introducción

El objetivo del proyecto es crear una API REST que proporcione funcionalidades para jugar al *Scrabble* (Apalabrados) de manera remota. Esta API tiene únicamente fines educativos y se desarrolla para que sea utilizada por los alumnos del módulo de Diseño de Interfaces Web con el objeto de diseñar la parte cliente.

## Herramientas

La API está desarrollada con [Laravel](https://laravel.com/). Como SGBD se utiliza MySQL.

Además se utilizan:

* [Docker](https://www.docker.com/), para la gestión y uso de contenedores que faciliten la instalación y despliegue de la aplicación.

## Infraestructura de trabajo

### Instalación

La puesta en marcha de la API se puede realizar a partir de una instalación de una infraestructura Laravel + MySQL, basada por ejemplo en MAMP, LAMP o XAMP. Aún así, para intentar estandarizar y facilitar la instalación en cualquier sistema operativo se recomienda el uso de Docker.

1. Instalar Docker CE. Descargar el instalador para el sistema operativo en el que se vaya a trabajar desde la página de [Docker](https://www.docker.com/community-edition). 

2. Crear una carpeta en la que vayamos a trabajar. Por ejemplo *Scrabble*.

3. Desde dentro de la carpeta creada en el apartado 2, clonar el respositorio *laradock*

```
$ git clone https://github.com/laradock/laradock.git
```

4. El clonado crea la carpeta *laradock*. Copiar el fichero *laradock/env-example* a otro llamado *laradock/.env*

```
$ cd laradock
$ cp env-example .env
```

5. Editar el fichero .env, modificando la línea donde se define la variable APPLICATION (es la primera variable)

```
APPLICATION=../API_REST_Scrabble/
```

6. Crear el entorno de trabajo. Para ello, desde la carpeta *laradock*:

```
$ docker-compose up -d nginx php-fpm mysql workspace phpmyadmin
```

> Este proceso puede tardar unos minutos

7. Comprobar que los contenedores están creados, arrancados y en qué puerto:

```
$ docker-compose ps
```

8. Desde la carpeta creada en el apartado 2, clonar el repositorio de la API

```
$ git clone https://gitlab.com/PRACTICE_SERVERS_4_DAW/API_REST_Scrabble.git
```

9. Crear la base de datos. Desde la carpeta *laradock*, ejecutar el siguiente comando, donde *MYSQLCONTAINER* es el nombre del contenedor MySQL creado, por ejemplo *laradock_mysql_1*. El nombre del contenedor se puede obtener ejecutando el comando del paso 7.

```
$ docker exec -i MYSQLCONTAINER mysql -uroot -proot < ../API_REST_Scrabble/database/scripts/create_database.sql
```

10. Para comprobar que todo funciona correctamente, hay que acceder a la *locahost* desde una navegador.

### Arranque y parada de contendores

El arranque de los contendores se realiza (obviamente con Docker arrancado), desde la carpeta *laradock*, mediante el comando:

```
docker-compose up -d nginx php-fpm mysql workspace phpmyadmin
```

mientras que la parada se realiza (también desde la carpeta *laradock*):

```
docker-compose down
```

## Autor

Alfredo Oltra (Twitter:  [@aoltra](https://twitter.com/aoltra) / [@uhurulabs](https://twitter.com/uhurulabs))

## Licencia
	
El proyecto está liberado bajo licencia [GPL 3.0](https://www.gnu.org/licenses/gpl-3.0-standalone.html).