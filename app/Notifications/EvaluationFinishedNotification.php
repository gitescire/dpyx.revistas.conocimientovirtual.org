<?php

namespace App\Notifications;

use App\Models\Category;
use App\Models\Evaluation;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EvaluationFinishedNotification extends Notification
{

    private $evaluation;
    private $firstCategory;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Evaluation $evaluation)
    {
        $this->evaluation = $evaluation;
        $this->firstCategory = Category::first();
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
            ->line('¡Una evaluación ha sido enviada!')
            ->subject('Nueva solicitud de revisión')
            ->action('revisar evaluación', route('evaluations.categories.questions.index', [$this->evaluation, $this->firstCategory]))
            ->line('¡Gracias!');
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
