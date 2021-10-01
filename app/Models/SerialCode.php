<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SerialCode extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'serial_code',
        'application_type_id',
        'status',
    ];

    public function applicationType()
    {
        return $this->belongsTo(ApplicationType::class, 'application_type_id');
    }

    public function paymentDetail()
    {
        return $this->hasOne(PaymentDetail::class, 'serial_code_id');
    }
}
