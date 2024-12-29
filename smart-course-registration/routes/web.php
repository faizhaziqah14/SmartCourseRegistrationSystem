<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\StudentCourseRegisteredController;
use App\Http\Controllers\Student\DegreeProgressController;

Route::get('/', function () {
    return view('welcome');
});

// Redirect route based on role selection
Route::get('/login/redirect', function (Illuminate\Http\Request $request) {
    $role = $request->input('role'); // Get the role selected by the user

    if ($role == 'student') {
        return redirect()->route('login'); // Redirect to the student login page
    } elseif ($role == 'academic_staff') {
        return redirect()->route('login'); // Redirect to the same login page (if unified)
    } else {
        return redirect('/'); // If no role selected, redirect to the welcome page
    }
})->name('login.redirect');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Unified login route for both students and academic staff
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//Student dashboard
Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
//To view course registered
Route::get('/student/courses/registered', [StudentCourseRegisteredController::class, 'index'])->name('student.courses.registered');
/* 
Route::get('/student/chat', [ChatController::class, 'index'])->name('student.chat');
*/

//Academic staff dashboard
Route::get('/academic-dashboard', function () {
    return view('academic.dashboard'); // Academic staff's dashboard view
})->name('academic.dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/student/degree-progress', [DegreeProgressController::class, 'showProgress'])
        ->name('student.degree.progress');
});
