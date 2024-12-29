<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DegreePlan extends Model
{
    protected $fillable = ['student_id', 'name']; // Define fillable attributes

    // Relationship: A degree plan belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    // Relationship: A degree plan has many mandatory courses
    public function mandatoryCourses()
    {
        return $this->hasMany(Course::class, 'degree_plan_id', 'id')->where('type', 'mandatory');
    }

    // Relationship: A degree plan has many elective courses
    public function electiveCourses()
    {
        return $this->hasMany(Course::class, 'degree_plan_id', 'id')->where('type', 'elective');
    }

    // Function to get the total number of courses (mandatory + elective)
    public function totalCourses(): int
    {
        return $this->mandatoryCourses()->count() + $this->electiveCourses()->count();
    }

    // Function to get pending mandatory courses based on completed courses
    public function getPendingMandatoryCourses($completedCourses)
    {
        return $this->mandatoryCourses()->whereNotIn('id', $completedCourses->pluck('id'))->get();
    }

    // Function to get pending elective courses based on completed courses
    public function getPendingElectiveCourses($completedCourses)
    {
        return $this->electiveCourses()->whereNotIn('id', $completedCourses->pluck('id'))->get();
    }
}
