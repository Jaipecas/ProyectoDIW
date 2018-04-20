<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Game Factories
|--------------------------------------------------------------------------
*/

$factory->define(App\Game::class, function (Faker $faker) {    

    $letters = array ('a', 'a', 'a', 'a', 'a', 'a', 'b','c', 'd', 'e', 'e', 'e', 'e', 'e',
                    'f', 'f', 'f', 'f', 'g', 'g', 'g', 'g', 'h','h', 'h', 'i', 'i', 'i', 'j', 'k', 'l',
                    'l', 'l', 'l', 'm' ,'m' ,'m' , 'm' ,'m' ,'n' ,'o', 'o', 'o', 'o',
                    'p', 'p', 'p', 'p', 'p', 'q', 'r', 'r', 'r', 'r', 's', 's', 's', 's', 't', 't', 't', 't',
                    'v', 'v', 'v', 'w', 'x', 'y', 'z', 'z', 'z', 'z');
    $p1_letters = $faker->randomElements($letters, $count = 7);
    array_diff_key($letters, $p1_letters);
    $p2_letters = $faker->randomElements($letters, $count = 7);

    do {
        $word = $faker->word;
    } while (strlen($word)>15);

    $word_table = str_repeat(' ', 15 - strlen($word)) . $word;

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
