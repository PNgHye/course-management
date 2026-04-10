<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Enrollment;
use App\Http\Requests\EnrollmentRequest;

class EnrollmentController extends Controller
{
    // FORM ĐĂNG KÝ
    public function create()
    {
        $courses = Course::all();
        return view('enrollments.create', compact('courses'));
    }

    // LƯU ĐĂNG KÝ
    public function store(EnrollmentRequest $request)
    {
        $student = Student::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        Enrollment::create([
            'course_id' => $request->course_id,
            'student_id' => $student->id
        ]);

        return redirect()->route('enrollments.index')
            ->with('success', 'Đăng ký thành công');
    }

    // DANH SÁCH THEO KHÓA HỌC
    public function index()
    {
        $courses = Course::with(['students'])->get();

        return view('enrollments.index', compact('courses'));
    }
}