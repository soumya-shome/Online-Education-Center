<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the home page.
     */
    public function index()
    {
        $courses = Course::latest()->take(6)->get();
        $upcomingExams = Exam::where('status', 'PENDING')
            ->with(['course', 'student'])
            ->latest()
            ->take(5)
            ->get();

        return view('home', compact('courses', 'upcomingExams'));
    }

    /**
     * Show the about page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the contact page.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Show the courses page.
     */
    public function courses()
    {
        $courses = Course::with('admin')->paginate(12);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show a specific course.
     */
    public function showCourse($id)
    {
        $course = Course::with(['admin', 'paperSets'])->findOrFail($id);
        return view('courses.show', compact('course'));
    }
} 