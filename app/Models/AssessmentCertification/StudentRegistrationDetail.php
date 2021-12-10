<?php

namespace App\Models\AssessmentCertification;

use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
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
        'training_provider_id',
        'programme_id',
        'programme_level_id',
        'academic_year',
        'candidate_type',
        'unit_standards',
        'registration_status',
        'registration_date',
        'registration_no',
        'serial_no',
        'candidate_id',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Student Registration Detail';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Student Registration Detail for {$this->registeredStudent->full_name} created by " . auth()->user()->username;
            case 'updated':
                return "Student Registration Detail for {$this->registeredStudent->full_name} updated by " . auth()->user()->username;
            case 'deleted':
                return "Student Registration Detail for {$this->registeredStudent->full_name} deleted by " . auth()->user()->username;
        };
    }

    public function registeredStudent()
    {
        return $this->belongsTo(TrainingProviderStudent::class, 'student_id');
    }

    public function studentAssessments()
    {
        return $this->hasMany(StudentAssessmentDetail::class, 'application_id');
    }

    public function programme()
    {
        return $this->belongsTo(Qualification::class, 'programme_id');
    }

    public function level()
    {
        return $this->belongsTo(QualificationLevel::class, 'programme_level_id');
    }

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
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
