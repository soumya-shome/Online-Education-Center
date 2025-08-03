@extends('layouts.app')

@section('title', 'Home - Online Exam Portal')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="jumbotron bg-light p-5 rounded">
            <h1 class="display-4">Welcome to Online Exam Portal</h1>
            <p class="lead">A comprehensive platform for managing online examinations and courses. Take exams, track your progress, and enhance your learning experience.</p>
            <hr class="my-4">
            <p>Get started by exploring our courses or registering for an account.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('courses') }}" role="button">Browse Courses</a>
            @guest
                <a class="btn btn-success btn-lg ms-2" href="{{ route('register') }}" role="button">Register Now</a>
            @endguest
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-book"></i> Available Courses</h5>
                        <p class="card-text">Explore our wide range of courses designed to enhance your skills and knowledge.</p>
                        <a href="{{ route('courses') }}" class="btn btn-outline-primary">View Courses</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clock"></i> Upcoming Exams</h5>
                        <p class="card-text">Stay updated with your scheduled examinations and important dates.</p>
                        @auth
                            @if(Auth::user()->isStudent())
                                <a href="{{ route('student.exams') }}" class="btn btn-outline-primary">My Exams</a>
                            @else
                                <a href="{{ route('admin.exams') }}" class="btn btn-outline-primary">Manage Exams</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Login to View</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-star"></i> Featured Courses</h5>
            </div>
            <div class="card-body">
                @if($courses->count() > 0)
                    @foreach($courses as $course)
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-graduation-cap fa-2x text-primary"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">{{ $course->name }}</h6>
                                <small class="text-muted">{{ $course->duration }}</small>
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ route('courses') }}" class="btn btn-sm btn-outline-primary w-100">View All Courses</a>
                @else
                    <p class="text-muted">No courses available at the moment.</p>
                @endif
            </div>
        </div>

        @if($upcomingExams->count() > 0)
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-calendar"></i> Upcoming Exams</h5>
            </div>
            <div class="card-body">
                @foreach($upcomingExams as $exam)
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <i class="fas fa-file-alt fa-2x text-warning"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1">{{ $exam->course->name }}</h6>
                            <small class="text-muted">{{ $exam->e_date }} - {{ $exam->e_slot }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<div class="row mt-5">
    <div class="col-12">
        <h2 class="text-center mb-4">Why Choose Our Platform?</h2>
    </div>
    <div class="col-md-4">
        <div class="text-center">
            <i class="fas fa-laptop fa-3x text-primary mb-3"></i>
            <h5>Online Exams</h5>
            <p>Take exams from anywhere with our secure online examination system.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="text-center">
            <i class="fas fa-chart-line fa-3x text-success mb-3"></i>
            <h5>Progress Tracking</h5>
            <p>Monitor your performance with detailed analytics and progress reports.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="text-center">
            <i class="fas fa-shield-alt fa-3x text-info mb-3"></i>
            <h5>Secure Platform</h5>
            <p>Your data and exam results are protected with industry-standard security.</p>
        </div>
    </div>
</div>
@endsection 