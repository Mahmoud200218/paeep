<?php

namespace App\Notifications\Notifications;

use App\Models\Front\Volunteer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VolunteerNotification extends Notification
{
    use Queueable;

    protected $volunteer;

    /**
     * Create a new notification instance.
     */
    public function __construct(Volunteer $volunteer)
    {
        $this->volunteer = $volunteer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        $via = [
            'database',
            'mail'
        ];
        return $via;
    }

    public function toDatabase($notifiable)
    {
        return [
            'name' => "{{$this->volunteer->full_name}} added a new volunteer request",
            'email' => $this->volunteer->email,
            'icon' => 'fas fa-user',
            'url' => '/dashboard/companies'
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line("{{$this->volunteer->full_name}} added a new volunteer request")
                    ->line($this->volunteer->email)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
