<?php
namespace App\Listeners;

use App\Events\ItemAddedToCart;
use Illuminate\Support\Facades\Redis;

class NotifyAdmin
{
    public function handle(ItemAddedToCart $event)
    {
        // Assuming you have a Redis server set up for broadcasting
        // You may customize this logic based on your requirements
        Redis::publish('admin-channel', json_encode([
            'event' => 'item_added_to_cart',
            'itemName' => $event->itemName,
        ]));
    }
}
