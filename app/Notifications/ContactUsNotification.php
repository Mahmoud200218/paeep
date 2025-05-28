<?php

namespace App\Notifications;

use App\Models\Front\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        $via =  [
            'database',
            //'mail'
        ];
        return $via;
    }

    /**
     * Get the mail representation of the notification.
     */

    public function toDatabase($notifiable)
    {
        return [
            'name' => "{{$this->contact->fullname}} added a new contact",
            'email' => $this->contact->email,
            'icon' => 'fas fa-envelope',
            'url' => '/dashboard/companies'
        ];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line("{{$this->contact->fullname}} added a new contact request")
            ->line($this->contact->email)
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }


    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage(
            [
                'name' => "{{$this->contact->fullname}} added a new contact",
                'email' => $this->contact->email,
                'icon' => 'fas fa-envelope',
                'url' => '/dashboard/companies'
            ]
        );
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
