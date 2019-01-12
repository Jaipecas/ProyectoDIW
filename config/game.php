<?php

return [
    'letters' => array(
            /* array con las letras disponibles de inicio por idioma 
               Obtenidas de https://es.wikipedia.org/wiki/Distribuci%C3%B3n_de_las_letras_en_el_Scrabble#Castellano 
               Se opta pr la versión de fuera de norteamérica 
               Como key se indica el código a utilizar internamente por el juego, y en caso de 
               que la letra se problemática (más de un caracter, no soportda como key, etc)
               se indica cual es en la propiedad letter
            */
            'es' => array(
                'A' => array('quantity' => 12, 'value' => 1),
                'B' => array('quantity' => 2, 'value' => 3),
                'C' => array('quantity' => 4, 'value' => 3),
                'c' => array('quantity' => 1, 'value' => 5, 'letter' => 'CH'),
                'D' => array('quantity' => 5, 'value' => 2),
                'E' => array('quantity' => 12, 'value' => 1),
                'F' => array('quantity' => 1, 'value' => 4),
                'G' => array('quantity' => 2, 'value' => 2),
                'H' => array('quantity' => 2, 'value' => 4),
                'I' => array('quantity' => 6, 'value' => 1),
                'J' => array('quantity' => 1, 'value' => 8),
                // 'K' => array('quantity' => 1, 'value' => 8),
                'L' => array('quantity' => 4, 'value' => 1),
                'l' => array('quantity' => 1, 'value' => 8, 'letter' => 'LL'),
                'M' => array('quantity' => 2, 'value' => 3),
                'N' => array('quantity' => 5, 'value' => 1),
                'n' => array('quantity' => 1, 'value' => 8, 'letter' => 'Ñ'),
                'O' => array('quantity' => 9, 'value' => 1),
                'P' => array('quantity' => 2, 'value' => 3),
                'Q' => array('quantity' => 1, 'value' => 5),
                'R' => array('quantity' => 5, 'value' => 1),
                'r' => array('quantity' => 1, 'value' => 8, 'letter' => 'RR'),
                'S' => array('quantity' => 6, 'value' => 1),
                'T' => array('quantity' => 4, 'value' => 1),
                'U' => array('quantity' => 5, 'value' => 1),
                'V' => array('quantity' => 1, 'value' => 4),
                // 'W' => array('quantity' => 1, 'value' => 8),
                'W' => array('quantity' => 1, 'value' => 8),
                'Y' => array('quantity' => 1, 'value' => 4),
                'Z' => array('quantity' => 1, 'value' => 10),
                ' ' => array('quantity' => 2, 'value' => 0), // comodin
            ),
            'en' => array(


            ),
        ),
    ];