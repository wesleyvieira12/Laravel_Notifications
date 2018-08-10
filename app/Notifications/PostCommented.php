<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\Comment;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostCommented extends Notification
{
    use Queueable;
    private $comment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( Comment $comment )
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->subject("Novo Comentário: {$this->comment->title}")
                    ->line($this->comment->body)
                    ->action('Ver comentário',route('posts.show',$this->comment->post_id))
                    ->line('Obrigado pro usar nosso site!');
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
            //
        ];
    }
}
