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

/* Para redifusionar un evento inmediatamente podemos usar la cola sync o
 * hacer que la clase implemente ShouldBroadcastNow 
 */
class AcceptedChallenge implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // sólo se emiten los miembros publicos
    private $user;
    public $gameId;
    public $oppoId, $oppoName, $oppoCountry, $oppoAvatar;
    public $lang;

    /**
     * Create a new event instance.
     * 
     * @return void
     */
    public function __construct($gameId, $lang, $user, $oppo) {
        
        $this->gameId = $gameId;
        $this->user = $user;
        $this->oppoId = $oppo->id;
        $this->oppoName = $oppo->name;
        $this->oppoCountry = $oppo->country;
        $this->oppoAvatar = strlen($oppo->avatar) != 0 ? "/storage/".$oppo->avatar : "";
        $this->lang = $lang;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        return new PrivateChannel('user.'.$this->user->id);
    }

    public function broadcastAs()
    {
        return 'AcceptedChallenge';
    }
}
