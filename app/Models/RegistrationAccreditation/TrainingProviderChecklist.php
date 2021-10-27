<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProviderChecklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_required'
    ];
}
