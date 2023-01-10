<?php

namespace App\Events;

use App\Models\User;
use App\Models\Student;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotifyStudent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $userId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        $user = User::where('student_id', $student->id)->first();
        $this->user = $user;
        $this->userId = $user->id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('notifyStud'.'.'.$this->user->id);
    }
}
