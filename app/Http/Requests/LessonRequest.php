<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    /**
     * Cho phép request chạy
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rule validate
     */
    public function rules(): array
    {
        return [
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
            'order' => 'required|integer|min:0'
        ];
    }

    /**
     * Thông báo lỗi (optional nhưng nên có)
     */
    public function messages(): array
    {
        return [
            'course_id.required' => 'Vui lòng chọn khóa học',
            'course_id.exists' => 'Khóa học không tồn tại',

            'title.required' => 'Tiêu đề không được để trống',
            'title.max' => 'Tiêu đề tối đa 255 ký tự',

            'video_url.url' => 'Link video không hợp lệ',

            'order.required' => 'Thứ tự là bắt buộc',
            'order.integer' => 'Thứ tự phải là số',
            'order.min' => 'Thứ tự phải >= 0',
        ];
    }
}