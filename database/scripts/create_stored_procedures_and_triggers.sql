/* Crea la base de datos

   Fecha inicio: 4/10/2018
   Autor: Alfredo Oltra

   Ejecución:
       a) desde el directorio 

          mysql -u root -p < ./database/scripts/create_stored_procedures_and_triggers.sql

          donde root es el login del administrador de MySQL.

        b) con Docker. Desde la carpeta laradock (y con los contendores arrancados):

          docker exec -i MYSQLCONTAINER mysql -uroot -proot < ../database/scripts/create_stored_procedures_and_triggers.sql
*/

USE scrabble;

DELIMITER //

/* Calcula el nivel del jugador para un idioma */
DROP FUNCTION IF EXISTS CalculateLevel;
CREATE FUNCTION CalculateLevel(won INT, lost INT)
    RETURNS INT
    BEGIN
        DECLARE level, played INT;
        SET played = won + lost;

        IF (played = 0) THEN
            SET level = 1;
        ELSE 
            SET level = FLOOR((won * 4 / played) + 1);
        END IF;

        RETURN level;
    END//
/*
DROP TRIGGER IF EXISTS upd_levels_played;
CREATE TRIGGER upd_levels_played AFTER UPDATE ON games
    FOR EACH ROW
    BEGIN
        IF NEW.state='win_p1' THEN
            UPDATE levels SET won = won + 1 WHERE user_id = NEW.player_1 AND language_code = NEW.language;
            UPDATE levels SET lost = lost + 1 WHERE user_id = NEW.player_2 AND language_code = NEW.language;
        ELSEIF NEW.state='win_p2' THEN
            UPDATE levels SET won = won + 1 WHERE user_id = NEW.player_2 AND language_code = NEW.language;
            UPDATE levels SET lost = lost + 1 WHERE user_id = NEW.player_1 AND language_code = NEW.language;
        END IF;
    END//
*/

/* Actualiza el nivel usuario en un idioma */
DROP TRIGGER IF EXISTS upd_levels_level;
CREATE TRIGGER upd_levels_level BEFORE UPDATE ON levels
    FOR EACH ROW
    BEGIN
        SET NEW.level = CalculateLevel(NEW.won,NEW.lost);
    END//
          
DELIMITER ;