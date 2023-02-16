<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public string $token)
    {    }

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
        // return (new FreelanceNotificationApply($this->freelance, $this->customer, $this->job))
        //                     ->to($notifiable->email);
        return (new MailMessage)
                    ->subject('Reinitialiser de votre mot de passe')
                    ->line('Vous avez demandé la reinitialisation de votre mot de passe ')
                    ->line('Question d\'en choisir un nouveau ,Veuiller cliquer sur le lien ci-dessous.')
                    // ->action(('Changer de mot de passe'), $url))
                    ->action('Changer de Mot de passe', route('email.update.view',[
                        $this->token
                        // 'email'=>$this->email,
                    ]))
                    ->line('Ce lien expirera dans 60 minutes ')
                    ->line('Si vous n\'etes pas à l\originie de cette demande,veuillez ne pas la prendre en compte.');
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
