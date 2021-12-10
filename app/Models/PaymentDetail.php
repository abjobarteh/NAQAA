<?php

namespace App\Models;

use App\Models\RegistrationAccreditation\ApplicationDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PaymentDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'application_id',
        'token_id',
        'amount',
        'status',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Payment details';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Payment details added by " . auth()->user()->username;
            case 'updated':
                return "Payment details updated by " . auth()->user()->username;
            case 'deleted':
                return "Payment details deleted by " . auth()->user()->username;
        };
    }

    public function application()
    {
        return $this->belongsTo(ApplicationDetail::class, 'application_id');
    }

    public function serialcode()
    {
        return $this->belongsTo(SerialCode::class, 'serial_code_id');
    }
}
