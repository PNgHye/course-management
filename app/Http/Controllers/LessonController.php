<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use App\Http\Requests\LessonRequest;

class LessonController extends Controller
{
    // LIST theo course + order
    public function index()
    {
        $lessons = Lesson::with('course')
            ->orderBy('order')
            ->get();

        return view('lessons.index', compact('lessons'));
    }

    // FORM CREATE
    public function create()
    {
        $courses = Course::all();
        return view('lessons.create', compact('courses'));
    }

    // STORE
    public function store(LessonRequest $request)
    {
        Lesson::create($request->validated());

        return redirect()->route('lessons.index')
            ->with('success', 'Thêm bài học thành công');
    }

    // EDIT
    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $courses = Course::all();

        return view('lessons.edit', compact('lesson', 'courses'));
    }

    // UPDATE
    public function update(LessonRequest $request, $id)
    {
        $lesson = Lesson::findOrFail($id);

        $lesson->update($request->validated());

        return redirect()->route('lessons.index')
            ->with('success', 'Cập nhật thành công');
    }

    // DELETE
    public function destroy($id)
    {
        Lesson::findOrFail($id)->delete();

        return back()->with('success', 'Đã xóa bài học');
    }
}