<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentCourseRegisteredController extends Controller
{
    public function index()
    {
        return view('student.courses.registered'); // Create a view for the course registration page
    }
}