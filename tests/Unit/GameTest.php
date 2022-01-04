<?php

namespace Tests\Unit;

use App\Models\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /**
     * Comprueba que la nueva posicion de la ficha sea correcta en
     * caso de que se mueva en horizontal
     * Ojo el nombre del test tiene que empezar por test o llevar la anotación @test
     * yo utilizao ambas, pero con una vale
     *
     * @return void
     */
    /** @test */
    public function test_new_position_in_horizontal()
    {
        [$col, $row] = Game::newPosition(2, 2, "H");
        $this->assertEquals($col, 3);
        $this->assertEquals($row, 2);
    }

    /**
     * Comprueba que la nueva posicion de la ficha sea correcta en
     * caso de que se mueva en vertical
     *
     * @return void
     */
    public function test_new_position_in_vertical()
    {
        [$col, $row] = Game::newPosition(2, 2, "V");
        $this->assertEquals($col, 2);
        $this->assertEquals($row, 3);
    }

    /**
     * Comprueba que la nueva posicion de la ficha sea correcta en
     * caso de que se mueva en vertical a la inversa
     *
     * @return void
     */
    public function test_new_position_in_vertical_inverse()
    {
        [$col, $row] = Game::newPosition(2, 2, "V", true);
        $this->assertEquals($col, 2);
        $this->assertEquals($row, 1);
    }

    /**
     * Comprueba que la nueva posicion de la ficha sea correcta en
     * caso de que se mueva en vertical a la inversa
     *
     * @return void
     */
    public function test_new_position_in_horizontal_inverse()
    {
        [$col, $row] = Game::newPosition(2, 2, "H", true);
        $this->assertEquals($col, 1);
        $this->assertEquals($row, 2);
    }
}
