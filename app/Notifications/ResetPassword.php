<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    use Queueable;
    
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Recuperación de contraseña del Hospital Simulado')
            ->line('Has recibido este email porque hemos recibido una solicitud de recuperación de contraseña para esta cuenta')
            ->action('Resetear Contraseña', url('password/reset', $this->token))
            ->line('Si tú no hiciste esta solicitud, cambia la contraseña de tu cuenta de inmediato para evitar más accesos no autorizados.');
    }
}

