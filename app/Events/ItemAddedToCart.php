<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ItemAddedToCart
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $itemName;

    public function __construct($itemName)
    {
        $this->itemName = $itemName;
    }
}
