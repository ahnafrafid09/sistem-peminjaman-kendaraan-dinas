<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PengembalianBaru
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $pengembalian;

    public function __construct($pengembalian)
    {
        $this->pengembalian = $pengembalian;
    }

    public function broadcastOn()
    {
        return new Channel('notifikasi');
    }

    public function broadcastAs()
    {
        return 'pengembalian.baru';
    }
}
