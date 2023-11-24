<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\RentModel;

class RentEvent
{
    use Dispatchable, SerializesModels;

    public $user;
    // public $books;

    /**
     * Create a new event instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(RentModel $user)
    {
        $this->user = $user;
    }
}
