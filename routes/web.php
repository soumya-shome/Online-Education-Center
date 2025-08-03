<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/courses/{id}', [HomeController::class, 'showCourse'])->name('courses.show');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Student routes
Route::middleware(['auth', 'student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::put('/profile', [StudentController::class, 'updateProfile'])->name('profile.update');
    Route::get('/courses', [StudentController::class, 'courses'])->name('courses');
    Route::post('/courses/{courseId}/enroll', [StudentController::class, 'enrollCourse'])->name('courses.enroll');
    Route::get('/exams', [StudentController::class, 'exams'])->name('exams');
    Route::get('/exams/{examId}', [StudentController::class, 'showExam'])->name('exams.show');
    Route::get('/exams/{examId}/start', [StudentController::class, 'startOnlineExam'])->name('exams.start');
    Route::post('/exams/{examId}/submit', [StudentController::class, 'submitOnlineExam'])->name('exams.submit');
    Route::get('/results', [StudentController::class, 'results'])->name('results');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Students management
    Route::get('/students', [AdminController::class, 'students'])->name('students');
    Route::get('/students/{id}', [AdminController::class, 'showStudent'])->name('students.show');
    Route::get('/students/{id}/edit', [AdminController::class, 'editStudent'])->name('students.edit');
    Route::put('/students/{id}', [AdminController::class, 'updateStudent'])->name('students.update');
    
    // Courses management
    Route::get('/courses', [AdminController::class, 'courses'])->name('courses');
    Route::get('/courses/create', [AdminController::class, 'createCourse'])->name('courses.create');
    Route::post('/courses', [AdminController::class, 'storeCourse'])->name('courses.store');
    Route::get('/courses/{id}/edit', [AdminController::class, 'editCourse'])->name('courses.edit');
    Route::put('/courses/{id}', [AdminController::class, 'updateCourse'])->name('courses.update');
    
    // Exams management
    Route::get('/exams', [AdminController::class, 'exams'])->name('exams');
    Route::get('/exams/create', [AdminController::class, 'createExam'])->name('exams.create');
    Route::post('/exams', [AdminController::class, 'storeExam'])->name('exams.store');
    
    // Results management
    Route::get('/results', [AdminController::class, 'results'])->name('results');
    
    // Paper sets management
    Route::get('/paper-sets', [AdminController::class, 'paperSets'])->name('paper-sets');
    Route::get('/paper-sets/create', [AdminController::class, 'createPaperSet'])->name('paper-sets.create');
    Route::post('/paper-sets', [AdminController::class, 'storePaperSet'])->name('paper-sets.store');
    Route::get('/paper-sets/{paperSetId}/questions', [AdminController::class, 'showPaperSetQuestions'])->name('paper-sets.questions.index');
    Route::get('/paper-sets/{paperSetId}/questions/create', [AdminController::class, 'createQuestion'])->name('paper-sets.questions.create');
    Route::post('/paper-sets/{paperSetId}/questions', [AdminController::class, 'storeQuestion'])->name('paper-sets.questions.store');
}); 