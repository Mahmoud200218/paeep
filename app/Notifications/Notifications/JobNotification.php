<?php

namespace App\Notifications\Notifications;

use App\Models\Front\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        $via = 
        [
            'database',
            'mail'
        ];
        return $via;
    }

    public function toDatabase($notifiable)
    {
        return [
            'name' => "{{$this->job->first_name}} added a new job request",
            'email' => $this->job->email,
            'icon' => 'fas fa-briefcase',
            'url' => '/dashboard/companies'
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line("{{$this->job->first_name}} added a new job request")
                    ->line($this->job->email)
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
