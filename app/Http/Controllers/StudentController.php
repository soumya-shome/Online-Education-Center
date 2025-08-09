<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Result;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('student');
    }

    /**
     * Show student dashboard.
     */
    public function dashboard()
    {
        $student = Auth::user()->student;
        $enrolledCourses = $student->courses()->with('course')->get();
        $upcomingExams = $student->exams()->where('status', 'PENDING')->with('course')->get();
        $recentResults = $student->results()->with('exam.course')->take(5)->get();

        return view('student.dashboard', compact('student', 'enrolledCourses', 'upcomingExams', 'recentResults'));
    }

    /**
     * Show student profile.
     */
    public function profile()
    {
        $student = Auth::user()->student;
        return view('student.profile', compact('student'));
    }

    /**
     * Update student profile.
     */
    public function updateProfile(Request $request)
    {
        $student = Auth::user()->student;

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $student->update([
            'f_name' => $request->first_name,
            'l_name' => $request->last_name,
            'ph_no' => $request->phone,
        ]);

        return redirect()->route('student.profile')
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Show available courses.
     */
    public function courses()
    {
        $student = Auth::user()->student;
        $enrolledCourseIds = $student->courses()->pluck('c_id')->toArray();
        
        $courses = Course::whereNotIn('c_id', $enrolledCourseIds)
            ->with('admin')
            ->paginate(12);

        return view('student.courses', compact('courses'));
    }

    /**
     * Enroll in a course.
     */
    public function enrollCourse($courseId)
    {
        $student = Auth::user()->student;
        $course = Course::findOrFail($courseId);

        // Check if already enrolled
        if ($student->courses()->where('c_id', $courseId)->exists()) {
            return redirect()->back()->with('error', 'Already enrolled in this course!');
        }

        $student->courses()->create([
            'c_id' => $courseId,
            'd_o_c' => date('d-m-Y'),
            'status' => 'EXAM',
        ]);

        return redirect()->route('student.courses')
            ->with('success', 'Successfully enrolled in ' . $course->name);
    }

    /**
     * Show student's exams.
     */
    public function exams()
    {
        $student = Auth::user()->student;
        $exams = $student->exams()->with(['course', 'paperSet'])->paginate(10);

        return view('student.exams', compact('exams'));
    }

    /**
     * Show exam details.
     */
    public function showExam($examId)
    {
        $student = Auth::user()->student;
        $exam = $student->exams()->with(['course', 'paperSet'])->findOrFail($examId);

        return view('student.exam-details', compact('exam'));
    }

    /**
     * Start online exam.
     */
    public function startOnlineExam($examId)
    {
        $student = Auth::user()->student;
        $exam = $student->exams()->with(['course', 'paperSet.questions'])->findOrFail($examId);

        if (!$exam->isOnline()) {
            return redirect()->back()->with('error', 'This is not an online exam!');
        }

        if ($exam->isCompleted()) {
            return redirect()->back()->with('error', 'This exam has already been completed!');
        }

        return view('student.online-exam', compact('exam'));
    }

    /**
     * Submit online exam.
     */
    public function submitOnlineExam(Request $request, $examId)
    {
        $student = Auth::user()->student;
        $exam = $student->exams()->with(['course', 'paperSet.questions'])->findOrFail($examId);

        $answers = $request->input('answers', []);
        $totalMarks = 0;
        $obtainedMarks = 0;

        foreach ($exam->paperSet->questions as $question) {
            $totalMarks += $question->marks;
            
            if (isset($answers[$question->q_id]) && $question->isCorrectAnswer($answers[$question->q_id])) {
                $obtainedMarks += $question->marks;
            }
        }

        $percentage = ($obtainedMarks / $totalMarks) * 100;
        $status = $percentage >= 50 ? 'PASS' : 'FAIL';

        // Create result
        Result::create([
            'e_id' => $examId,
            'st_id' => $student->s_id,
            'tot_q' => count($exam->paperSet->questions),
            'tot_a_q' => count($answers),
            'tot_w_q' => count($exam->paperSet->questions) - count(array_filter($answers)),
            'tot_r_q' => count(array_filter($answers)),
            'marks' => $obtainedMarks,
            'n_marks' => $totalMarks - $obtainedMarks,
            'percentage' => $percentage,
            'status' => $status,
        ]);

        // Update exam status
        $exam->update(['status' => 'COMPLETE']);

        return redirect()->route('student.results')
            ->with('success', 'Exam submitted successfully!');
    }

    /**
     * Show student's results.
     */
    public function results()
    {
        $student = Auth::user()->student;
        $results = $student->results()->with(['exam.course'])->paginate(10);

        return view('student.results', compact('results'));
    }
} 