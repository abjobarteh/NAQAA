<?php

namespace App\Http\Livewire\Systemadmin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class FilterLogs extends Component
{
    public $user, $start_date, $end_date, $logs, $is_logs_empty = true;

    public function render()
    {
        $users = User::all()->pluck('username', 'id');

        return view('livewire.systemadmin.filter-logs', compact('users'))
            ->extends('layouts.admin');
    }

    public function closeFilterlogsModal()
    {
        $this->reset([
            'user',
            'start_date',
            'end_date',
            'logs',
            'is_logs_empty'
        ]);

        $this->dispatchBrowserEvent('closeFilterlogsModal');
    }

    public function filterlogs()
    {
        if ($this->user == null && $this->start_date == null && $this->end_date == null) {
            return $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'title' => 'No Parameters',
                'message' => 'Please select at least one parameter to filter by!'
            ]);
        } else if ($this->user != null && $this->start_date == null && $this->end_date == null) {
            $this->logs = Activity::with(['causer', 'subject'])
                ->whereHas('causer', function (Builder $query) {
                    $query->where('id', $this->user);
                })
                ->orderBy('created_at', 'desc')
                ->get();
        } else if ($this->start_date != null && $this->end_date != null &&  $this->user == null) {
            $this->logs = Activity::with(['causer', 'subject'])
                ->whereHas('causer')
                ->whereDate('created_at', '>=', $this->start_date)
                ->whereDate('created_at', '<=', $this->end_date)
                ->orderBy('created_at', 'desc')
                ->get();
        } else if ($this->user != null &&  $this->start_date != null && $this->end_date != null) {
            $this->logs = Activity::with(['causer', 'subject'])
                ->whereHas('causer', function (Builder $query) {
                    $query->where('id', $this->user);
                })
                ->whereDate('created_at', '>=', $this->start_date)
                ->whereDate('created_at', '<=', $this->end_date)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            return $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'title' => 'Parameter Combinations not available',
                'message' => 'These Parameter combinations for filtering is not available!'
            ]);
        }

        if (!$this->logs->isEmpty()) {

            $this->is_logs_empty = false;
            $this->dispatchBrowserEvent('openFilterlogsModal');
        } else {
            return $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'title' => 'No Results',
                'message' => 'No results exist for these parameter(s)!'
            ]);
        }
    }
}
