<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notifications extends Component
{
    public function render()
    {
        $notifications = auth()->user()->roles[0]->unreadNotifications;
        // dd($notifications);

        return view('livewire.notifications', compact('notifications'))->extends('layouts.admin');
    }
}
