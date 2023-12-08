<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lecturer extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'nidn';

    protected $fillable = [
        'nidn',
        'name',
        'department_id',
    ];

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'nidn', 'nidn');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'nidn', 'nidn');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
