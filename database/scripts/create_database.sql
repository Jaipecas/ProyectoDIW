/* Crea la base de datos

   Fecha inicio: 11/03/2018
   Autor: Alfredo Oltra

   Ejecución:
       a) desde el directorio 

          mysql -u root -p < ./database/scripts/create_database.sql

          donde root es el login del administrador de MySQL.

        b) con Docker. Desde la carpeta laradock (y con los contendores arrancados):

          docker exec -i MYSQLCONTAINER mysql -uroot -proot < ../API_REST_Scrabble/database/scripts/create_database.sql

          donde:
            uroot es el login del administrador de MySQL.
            proot es el passowrd del administrador de MySQL.
            MYSQLCONTAINER es el nombre del contenedor MySQL creado, por ejemplo *laradock_mysql_1*.
                           El nombre del contenedor se puede obtener ejecutando el comando del paso 7.

*/
 CREATE DATABASE scrabble;