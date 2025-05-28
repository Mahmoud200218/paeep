<?php

namespace App\Notifications\Notifications;

use App\Models\Company;
use App\Models\Front\CompaniesRequest;
use com_exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CompanyNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    protected $companiesRequest;

    public function __construct(CompaniesRequest $companiesRequest )
    {
        $this->companiesRequest = $companiesRequest;
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
            'name' => "{{$this->companiesRequest->organization_name}} added a new company request",
            'email' => $this->companiesRequest->type_of_organization,
            'icon' => 'fas fa-building',
            'url' => '/dashboard/companies'
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line("{{$this->companiesRequest->organization_name}} added a new company request")
                    ->line($this->companiesRequest->type_of_organization)
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
