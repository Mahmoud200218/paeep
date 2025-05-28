<?php

namespace App\Notifications\Notifications;

use App\Models\Front\Donate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonateNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $donate;

    public function __construct(Donate $donate)
    {
        $this->donate = $donate;
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
            'name' => "{{$this->donate->donater_name}} added a new donate",
            'email' => $this->donate->email,
            'icon' => 'fas fa-envelope',
            'url' => '/dashboard/companies'
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line("{{$this->donate->donater_name}} added a new donate")
            ->line($this->donate->email)
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
