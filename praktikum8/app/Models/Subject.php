<?php

namespace App\Models;

// Perbaikan import HasFactory yang benar:
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // Perbaikan properti fillable (menambahkan tanda "=" yang hilang di modul)
    protected $fillable = ['name', 'sks'];

    /**
     * Relationship: Many Subjects belong to many Students
     */
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}