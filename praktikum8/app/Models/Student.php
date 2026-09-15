<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
use HasFactory;
protected $fillable = ['nim', 'name', 'address', 'major_id'];
// Relationship: Many Students belong to one Major
public function major()
{
return $this->belongsTo(Major::class);
}
// Relationship: Many Students belong to many Subjects
public function subjects()
{
return $this->belongsToMany(Subject::class);
}
}