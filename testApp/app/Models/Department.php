<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Department extends Model
{
    use HasFactory;

    public function student(): HasOneThrough
    {
        return $this->hasOneThrough(
            Student::class,
            Lecturer::class,
            'department_id',
            'nidn',
            'id',
            'nidn'
        );
    }
    
    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(
            Student::class,
            Lecturer::class,
            'department_id',
            'nidn',
            'id',
            'nidn'
        );
    }
}
