<?php

namespace App\Listeners;

use App\Events\QueueUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class QueueUpdatedListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(QueueUpdated $event)
    {
        // Handle the event (update the queue, etc.)
    }
}

