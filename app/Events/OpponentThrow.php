<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class OpponentThrow implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // sólo se emiten los miembros publicos
  //  private $user;      // usuario que lo envia
    private $gameId;
    private $oppoId;
    public $wordScore;
    public $playerScore;
    public $state;
    public $tableboard;
    public $word;
    public $col;
    public $row;
    public $dir;
    public $numberRemainingTokens;
    public $playerState;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($game, $word, $col, $row, $dir, $pscore, $wscore, $oppoId, $pstate)
    {
        $this->gameId = $game->id;
        $this->oppoId = $oppoId;

        $this->word = $word;
        $this->wordScore = $wscore;
        $this->playerScore = $pscore;
        $this->tableboard = $game->tableboard;
        $this->state = $game->state;
        $this->col = $col;
        $this->row = $row;
        $this->dir = $dir;
        $this->numberRemainingTokens = strlen($game->remaining_letters);
        $this->playerState = $pstate;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        return new PrivateChannel('game.'.$this->gameId.'.user.'.$this->oppoId);
    }
}
