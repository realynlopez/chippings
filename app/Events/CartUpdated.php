<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CartUpdated implements ShouldBroadcast
{
    use InteractsWithSockets;

    public $userName;
    public $productName;

    public function __construct($userName, $productName)
    {
        $this->userName = $userName;
        $this->productName = $productName;
    }

    public function broadcastOn()
    {
        return new Channel('cart-updates');
    }
}
