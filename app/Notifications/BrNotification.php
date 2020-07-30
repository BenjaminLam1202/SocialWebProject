<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Post;

class BrNotification extends Notification
{
    use Queueable;
    protected $post;
     public function __construct($post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        
        
        return [
        $data = $this->post,
        'title' => $data['title'],
        'des' => $data['des']
    ];

    }
}
