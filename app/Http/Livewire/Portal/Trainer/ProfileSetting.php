<?php

namespace App\Http\Livewire\Portal\Trainer;

use Livewire\Component;

class ProfileSetting extends Component
{
    public function render()
    {
        return view('livewire.portal.trainer.profile-setting')
            ->extends('layouts.portal');
    }
}
