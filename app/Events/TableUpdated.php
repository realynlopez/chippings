<?php

// app/Events/TableUpdated.php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TableUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tableId;
    public $isAvailable;

    public function __construct($tableId, $isAvailable)
    {
        $this->tableId = $tableId;
        $this->isAvailable = $isAvailable;
    }

    public function broadcastOn()
    {
        return new Channel('table-updates');
    }
}

