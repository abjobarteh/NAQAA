<?php

namespace App\Models\AssessmentCertification;

use App\Models\TrainingProviderStudent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StudentRegistrationDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'student_id',
        'registration_no',
        'serial_no',
        'registration_date',
    ];

    public function registeredStudent()
    {
        return $this->belongsTo(TrainingProviderStudent::class, 'student_id');
    }

    public function studentAssessments()
    {
        return $this->hasMany(StudentAssessmentDetail::class, 'application_id');
    }

    public function setRegistrationDateAttribute($value)
    {
        $this->attributes['registration_date'] = new Carbon($value);
    }

    public function getRegistrationDateAttribute($value)
    {
        return (new Carbon($value))->toDayDateTimeString();
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $records = StudentRegistrationDetail::all();
            $new_serial_no = null;
            if ($records->isEmpty()) {
                $new_serial_no = '0001';
                $reg_no = 'I' . $new_serial_no . (Carbon::now())->format('Y');
                $model->registration_no = $reg_no;
                $model->serial_no = $new_serial_no;
            } else {
                $last_record = StudentRegistrationDetail::latest()->limit(1)->get();
                $new_serial_no = str_pad((int)$last_record[0]->serial_no + 1, 4, '0', STR_PAD_LEFT);
                $reg_no = 'I' . $new_serial_no . (Carbon::now())->format('Y');
                $model->registration_no = $reg_no;
                $model->serial_no = $new_serial_no;
            }
        });
    }
}
