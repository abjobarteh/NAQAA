<?php

namespace App\Models\ResearchDevelopment;

use App\Models\EducationField;
use App\Models\EntryLevelQualification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentDetailsDataCollection extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'student_id',
        'firstname',
        'middlename',
        'lastname',
        'gender',
        'phone',
        'nationality',
        'ethnicity',
        'date_of_birth',
        'programme',
        'attendance_status',
        'admission_date',
        'qualification_at_entry',
        'award',
        'education_field_id',
        'institution_id',
        'studentdetail_type',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Student Detail';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Student Detail data collection record added by ".auth()->user()->username;
            case 'updated': 
                     return "Student Detail data collection record updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Student Detail data collection record deleted by ".auth()->user()->username;
        };
        
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstname} .{$this->middlename}. {$this->lastname}";
    }

    public function learningcenter()
    {
        return $this->belongsTo(InstitutionDetailsDataCollection::class,'institution_id');
    }

    public function educationField()
    {
        return $this->belongsTo(EducationField::class,'education_field_id');
    }

    public function graduationDetail()
    {
        return $this->hasOne(GraduateStudentDataCollection::class,'student_details_id');
    }

}
