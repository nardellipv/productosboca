<?php

namespace bocaamerica\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class MailResetPasswordNotification extends Notification
{
//    use Queueable;
    public $token;
    public static $toMailCallback;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->subject(Lang::getFromJson('Generar nueva contraseña'))
            ->from(Lang::getFromJson('no-respond@bocaamerica.com'))
            ->line(Lang::getFromJson('Recibiste este mail porque olvidaste tu contraseña. Para generarla nuevamente haz click sobre el botón.'))
            ->action(Lang::getFromJson('Generar Password'), url(config('app.url').route('password.reset', $this->token, false)))
            ->line(Lang::getFromJson('Si no requeriste una nueva contraseña, desestima este email. '));
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
