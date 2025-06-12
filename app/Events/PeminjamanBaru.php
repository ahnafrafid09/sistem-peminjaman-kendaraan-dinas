<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

class PeminjamanBaru implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
        $this->message = 'Anda menerima pengajuan peminjaman baru';
    }

    public function broadcastOn()
    {
        return new PrivateChannel('notifikasi.' . $this->userId);
    }

    public function broadcastAs()
    {
        return 'peminjaman.baru';
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
        ];
    }
}
