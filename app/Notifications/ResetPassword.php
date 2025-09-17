<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use Illuminate\Auth\Notifications\ResetPassword as NotificationsResetPassword;

class ResetPassword extends NotificationsResetPassword
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            ->subject(Lang::get('Notificación de cambio de contraseña'))
            ->line(Lang::get('Recibiste este correo porque solicitaste cambiar la contraseña de tu cuenta'))
            // ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
            ->action(Lang::get('Cambiar contraseña'), $url)
            ->line(Lang::get('Este link de cambio de contraseña expirará en :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('Si no solicitaste un cambio de contraseña, no es requerida ninguna otra acción.'));
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
