<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends Notification
{
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
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Wachtwoord Reset Verzoek')
            ->greeting('Hallo!')
            ->line('Je hebt aangegeven dat je je wachtwoord vergeten bent.')
            ->action('Klik hier om je wachtwoord te resetten', $url)
            ->line('Als je dit niet hebt aangevraagd, hoef je niets te doen.')
            ->salutation("Met vriendelijke groet,\n\nHet Team van Pre-Order");

    }
}
