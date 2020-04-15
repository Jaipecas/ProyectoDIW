<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Game Factories
|--------------------------------------------------------------------------
*/

$factory->define(App\Game::class, function (Faker $faker) {    

    $letters = array ('A', 'A', 'A', 'A', 'A', 'A', 'B', 'C', 'c', 'D', 'E', 'E', 'E', 'E', 'E',
                    'F', 'F', 'F', 'F', 'G', 'G', 'G', 'G', 'H','H', 'H', 'I', 'I', 'I', 'J', 'K', 'L',
                    'L', 'L', 'L', 'M' ,'M' ,'M' , 'M' ,'M' ,'N' ,'O', 'O', 'O', 'O',
                    'P', 'P', 'P', 'P', 'P', 'Q', 'r', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'T', 'T', 'T', 'T',
                    'V', 'V', 'V', 'W', 'X', 'Y', 'Z', 'Z', 'Z', 'Z');
                    
    $p1_letters = $faker->randomElements($letters, $count = 7);
    array_diff_key($letters, $p1_letters);
    $p2_letters = $faker->randomElements($letters, $count = 7);

    for ($i =0; $i<7; $i++) {
        $val = rand(1, 10);
        $p1_letters[$i] = $p1_letters[$i] . substr("0000{$val}", -2);
        $val = rand(1, 10);
        $p2_letters[$i] = $p2_letters[$i] . substr("0000{$val}", -2);
    }

    do {
        $word = $faker->word;
    } while (strlen($word)>15 || strpos($word, 'ch') === true || strpos($word, 'll') === true || strpos($word, 'ñ') === true);

    $word_table = str_repeat(' ', 15 - strlen($word)) . strtoupper($word);

    return [
        'language' => $faker->randomElement(array ('en', 'es')),
        'state' => $faker->randomElement(array ('unstarted','turn_p1','turn_p2','win_p1','win_p2')),
        'player_1_letters' => implode($p1_letters),
        'player_2_letters' => implode($p1_letters),
        'player_1_score' => $faker->numberBetween(5,360),
        'player_2_score' => $faker->numberBetween(5,360),
        // estado tablero 15x15 caracteres
        'tableboard' => '     AVION     ' 
                      . '  COLA         ' 
                      . '  HOLA         ' 
                      . '               '
                      . '  C            ' 
                      . '  A            ' 
                      . '  MEDALLA      ' 
                      . '  A     MATEO  '
                      . '  L     O      ' 
                      . '  E     R      ' 
                      . '  OTRA         ' 
                      . '  N            '
                      . '               ' 
                      . $word_table
                      . '               ',
        
        'remaining_letters' => implode($faker->randomElements($letters, $count = $faker->numberBetween(3, 70))),
        'throw'=> '1B02COLA|2C02HOLA|1A04AVION|202ECAMALEON|1H08MATEO|207GAMOR|1K02OTRA|2N' . sprintf("%2d", 15 - strlen($word)) . $word_table,
    ];
});
