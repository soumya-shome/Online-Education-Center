<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Result;
use App\Models\PaperSet;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show admin dashboard.
     */
    public function dashboard()
    {
        $totalStudents = Student::count();
        $totalCourses = Course::count();
        $totalExams = Exam::count();
        $totalResults = Result::count();
        
        $recentExams = Exam::with(['student', 'course'])->latest()->take(5)->get();
        $recentResults = Result::with(['student', 'exam.course'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalStudents', 
            'totalCourses', 
            'totalExams', 
            'totalResults',
            'recentExams',
            'recentResults'
        ));
    }

    /**
     * Show all students.
     */
    public function students()
    {
        $students = Student::with('user')->paginate(15);
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show student details.
     */
    public function showStudent($id)
    {
        $student = Student::with(['user', 'courses.course', 'exams.course', 'results.exam.course'])->findOrFail($id);
        return view('admin.students.show', compact('student'));
    }

    /**
     * Show edit student form.
     */
    public function editStudent($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update student.
     */
    public function updateStudent(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);

        $student->update([
            'f_name' => $request->first_name,
            'l_name' => $request->last_name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.students.show', $id)
            ->with('success', 'Student updated successfully!');
    }

    /**
     * Show all courses.
     */
    public function courses()
    {
        $courses = Course::with('admin')->paginate(15);
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show create course form.
     */
    public function createCourse()
    {
        return view('admin.courses.create');
    }

    /**
     * Store new course.
     */
    public function storeCourse(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|string',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $courseData = [
            'c_id' => 'C' . str_pad(Course::count() + 1, 4, '0', STR_PAD_LEFT),
            'name' => $request->name,
            'duration' => $request->duration,
            'description' => $request->description,
            'created_by' => Auth::user()->email,
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $courseData['c_id'] . '.' . $file->getClientOriginalExtension();
            $file->storeAs('courses', $fileName, 'public');
            $courseData['file'] = $fileName;
        }

        Course::create($courseData);

        return redirect()->route('admin.courses')
            ->with('success', 'Course created successfully!');
    }

    /**
     * Show edit course form.
     */
    public function editCourse($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update course.
     */
    public function updateCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|string',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $courseData = [
            'name' => $request->name,
            'duration' => $request->duration,
            'description' => $request->description,
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $course->c_id . '.' . $file->getClientOriginalExtension();
            $file->storeAs('courses', $fileName, 'public');
            $courseData['file'] = $fileName;
        }

        $course->update($courseData);

        return redirect()->route('admin.courses')
            ->with('success', 'Course updated successfully!');
    }

    /**
     * Show all exams.
     */
    public function exams()
    {
        $exams = Exam::with(['student', 'course', 'paperSet'])->paginate(15);
        return view('admin.exams.index', compact('exams'));
    }

    /**
     * Show create exam form.
     */
    public function createExam()
    {
        $students = Student::all();
        $courses = Course::all();
        $paperSets = PaperSet::all();
        
        return view('admin.exams.create', compact('students', 'courses', 'paperSets'));
    }

    /**
     * Store new exam.
     */
    public function storeExam(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,s_id',
            'course_id' => 'required|exists:courses,c_id',
            'paper_set_id' => 'required|exists:paper_sets,p_id',
            'exam_date' => 'required|date',
            'exam_slot' => 'required|string',
        ]);

        $examData = [
            'e_id' => 'E' . str_pad(Exam::count() + 1, 4, '0', STR_PAD_LEFT),
            'st_id' => $request->student_id,
            'c_id' => $request->course_id,
            'p_set' => $request->paper_set_id,
            'e_date' => $request->exam_date,
            'e_slot' => $request->exam_slot,
            'p_type' => PaperSet::find($request->paper_set_id)->p_type,
            'activation_code' => strtoupper(Str::random(5)),
            'status' => 'PENDING',
            'created_by' => Auth::user()->email,
        ];

        Exam::create($examData);

        return redirect()->route('admin.exams')
            ->with('success', 'Exam created successfully!');
    }

    /**
     * Show all results.
     */
    public function results()
    {
        $results = Result::with(['student', 'exam.course'])->paginate(15);
        return view('admin.results.index', compact('results'));
    }

    /**
     * Show paper sets.
     */
    public function paperSets()
    {
        $paperSets = PaperSet::with(['course', 'questions'])->paginate(15);
        return view('admin.paper-sets.index', compact('paperSets'));
    }

    /**
     * Show create paper set form.
     */
    public function createPaperSet()
    {
        $courses = Course::all();
        return view('admin.paper-sets.create', compact('courses'));
    }

    /**
     * Store new paper set.
     */
    public function storePaperSet(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,c_id',
            'paper_type' => 'required|in:ONLINE,OFFLINE',
            'total_marks' => 'required|integer|min:1',
            'time_limit' => 'required|integer|min:1',
        ]);

        $paperSetData = [
            'p_id' => 'P' . str_pad(PaperSet::count() + 1, 4, '0', STR_PAD_LEFT),
            'c_id' => $request->course_id,
            'p_type' => $request->paper_type,
            'total_marks' => $request->total_marks,
            'time_limit' => $request->time_limit,
            'created_by' => Auth::user()->email,
        ];

        $paperSet = PaperSet::create($paperSetData);

        return redirect()->route('admin.paper-sets.questions.create', $paperSet->p_id)
            ->with('success', 'Paper set created successfully! Add questions now.');
    }

    /**
     * Show questions for a paper set.
     */
    public function showPaperSetQuestions($paperSetId)
    {
        $paperSet = PaperSet::with(['course', 'questions'])->findOrFail($paperSetId);
        return view('admin.paper-sets.questions.index', compact('paperSet'));
    }

    /**
     * Show create question form.
     */
    public function createQuestion($paperSetId)
    {
        $paperSet = PaperSet::findOrFail($paperSetId);
        return view('admin.paper-sets.questions.create', compact('paperSet'));
    }

    /**
     * Store new question.
     */
    public function storeQuestion(Request $request, $paperSetId)
    {
        $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:A,B,C,D',
            'marks' => 'required|integer|min:1',
        ]);

        $questionData = [
            'q_id' => 'Q' . str_pad(Question::count() + 1, 4, '0', STR_PAD_LEFT),
            'p_id' => $paperSetId,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_answer' => $request->correct_answer,
            'marks' => $request->marks,
        ];

        Question::create($questionData);

        return redirect()->route('admin.paper-sets.questions.index', $paperSetId)
            ->with('success', 'Question added successfully!');
    }
} 