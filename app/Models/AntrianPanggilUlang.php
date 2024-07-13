<?php

namespace App\Events;

use App\Models\Antrian;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AntrianPanggilUlang
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $antrian;

    public function __construct(Antrian $antrian)
    {
        $this->antrian = $antrian;
    }
}

