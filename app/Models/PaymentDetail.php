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

    public function application()
    {
        return $this->belongsTo(ApplicationDetail::class, 'application_id');
    }

    public function serialcode()
    {
        return $this->belongsTo(SerialCode::class, 'serial_code_id');
    }
}
