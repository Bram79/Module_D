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
            ->subject('Reset your password')
            ->greeting('Hello!')
            ->line('You have requested a password reset.')
            ->action('Click here to reset your password', url(route('password.reset', $this->token, false)))
            ->line('If you did not request this, no further action is required.')
            ->salutation('Kind regards, Pre-Order Team');

    }
}
