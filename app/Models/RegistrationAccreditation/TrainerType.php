<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sulg'];
}
