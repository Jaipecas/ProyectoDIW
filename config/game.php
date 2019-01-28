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
                '*' => array('quantity' => 2, 'value' => 0), // comodin
            ),
            'en' => array(


            ),
        ),
        'tableboard' => array(
            'A1' => '3W', 'A18' => '3W', 'A15' => '3W', 'H1' => '3W', 'H15' => '3W', 'O1' => '3W', 'O8' => '3W', 'O15' => '3W',
            
            'A4' => '2L', 'A12' => '2L', 'C7' => '2L', 'C9' => '2L', 'D1' => '2L', 'D8' => '2L', 
            'D15' => '2L', 'G3' => '2L', 'G7' => '2L', 'G9' => '2L', 'G13' => '2L', 'H4' => '2L',
            'O4' => '2L', 'O12' => '2L', 'M7' => '2L', 'M9' => '2L', 'L1' => '2L', 'L8' => '2L', 
            'L15' => '2L', 'I3' => '2L', 'I7' => '2L', 'I9' => '2L', 'I13' => '2L', 'H12' => '2L',
            
            'B6' => '3L', 'B10' => '3L', 'F3' => '3L', 'F6' => '3L', 'F10' => '3L', 'F14' => '3L', 
            'N6' => '3L', 'N10' => '3L', 'J3' => '3L', 'J6' => '3L', 'J10' => '3L', 'J14' => '3L', 

            'B2' => '2W', 'B14' => '2W', 'C3' => '2W', 'C13' => '2W', 'D4' => '2W', 'D12' => '2W', 'E5' => '2W', 'E11' => '2W',
            'N2' => '2W', 'N14' => '2W', 'M3' => '2W', 'M13' => '2W', 'L4' => '2W', 'L12' => '2W', 'K5' => '2W', 'K11' => '2W',
            'H8' => '2W'

        )
    ];