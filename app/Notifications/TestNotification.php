<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Comment;

class TestNotification extends Notification
{
    use Queueable;

    protected $comentario;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comentario,$title)
    {
        $this->comentario = $comentario;
        $this->title = $title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting("hola amigo")
                    ->line('The introduction to the notification.')
                    ->action('Boton', url('/'))
                    ->line('Parte final correo');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            
            "user_id"=> $this->comentario->user_id,
            "post_id"=> $this->comentario->post_id,
            "title"=> $this->title,
        ];
    }
}
