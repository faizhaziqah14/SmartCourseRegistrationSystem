<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class DegreeProgressController extends Controller
{
    // Show Degree Progress Page
    public function showProgress()
    {
        // Fetch the authenticated user
        $user = Auth::user();
        
        // Check if the user is authenticated and is a student
        if (!$user || !$user->isStudent()) {
            return redirect()->route('login')->withErrors('You must be logged in as a student to access this page.');
        }

        // Ensure the user has a linked student profile
        $student = $user->student;
        if (!$student) {
            return view('student.degree_progress')->withErrors('Student profile not found.');
        }

        // Fetch the student's degree plan
        $degreePlan = $student->degreePlan;
        if (!$degreePlan) {
            return view('student.degree_progress')->withErrors('Degree plan not found.');
        }

        // Get completed courses and calculate the progress
        $completedCourses = $student->completedCourses()->get();
        $totalCourses = $degreePlan->totalCourses();
        $completedCount = $completedCourses->count();
        $completionRate = $totalCourses > 0 ? ($completedCount / $totalCourses) * 100 : 0;

        // Fetch suggestions for electives based on degree requirements
        $suggestedElectives = $this->getSuggestedElectives($student);

        // Pass data to the view
        return view('student.degree_progress', [
            'completedCourses' => $completedCourses,
            'totalCourses' => $totalCourses,
            'completionRate' => $completionRate,
            'suggestedElectives' => $suggestedElectives,
            'degreePlan' => $degreePlan
        ]);
    }

    // Function to get suggested electives
    private function getSuggestedElectives($student)
    {
        $completedCourseIds = $student->completedCourses()->pluck('id')->toArray();
        return Course::where('type', 'elective')
                     ->whereNotIn('id', $completedCourseIds)
                     ->get();
    }
}
