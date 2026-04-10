<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        // load kèm số bài học + số học viên (đúng yêu cầu đề)
        $courses = Course::withCount(['lessons', 'enrollments'])->paginate(5);

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(CourseRequest $request)
    {
        // chỉ lấy dữ liệu đã validate
        $data = $request->validated();

        // slug tự sinh
        $data['slug'] = Str::slug($data['name']);

        // upload ảnh
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        Course::create($data);

        return redirect()->route('courses.index')
            ->with('success', 'Thêm khóa học thành công');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    public function update(CourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);

        $data = $request->validated();

        // cập nhật slug
        $data['slug'] = Str::slug($data['name']);

        // nếu có ảnh mới → xóa ảnh cũ
        if ($request->hasFile('image')) {

            if ($course->image && Storage::disk('public')->exists($course->image)) {
                Storage::disk('public')->delete($course->image);
            }

            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        $course->update($data);

        return redirect()->route('courses.index')
            ->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        // Soft delete (đề yêu cầu)
        $course->delete();

        return back()->with('success', 'Đã xóa (Soft Delete)');
    }

    // 🔥 BONUS: Khôi phục (đề có yêu cầu)
    public function restore($id)
    {
        Course::withTrashed()->findOrFail($id)->restore();

        return back()->with('success', 'Khôi phục thành công');
    }
}