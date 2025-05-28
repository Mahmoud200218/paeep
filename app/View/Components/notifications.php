<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class notifications extends Component
{
    /**
     * Create a new component instance.
     */
    public $notifications;

    public $newCount;

    public function __construct($count = 5)
    {
        $admin = Auth::user();

        $this->notifications = $admin->unreadNotifications()->take($count)->get();

        $this->newCount = $admin->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notifications');
    }
}
