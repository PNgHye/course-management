@extends('layouts.master')

@section('content')

<form action="{{ route('lessons.store') }}" method="POST">
@csrf

<select name="course_id" class="form-control mb-2">
    @foreach($courses as $course)
        <option value="{{ $course->id }}">
            {{ $course->name }}
        </option>
    @endforeach
</select>

<input type="text" name="title" class="form-control mb-2" placeholder="Tiêu đề">

<textarea name="content" class="form-control mb-2" placeholder="Nội dung"></textarea>

<input type="text" name="video_url" class="form-control mb-2" placeholder="Video URL">

<input type="number" name="order" class="form-control mb-2" placeholder="Thứ tự">

<button class="btn btn-success">Lưu</button>

</form>

@endsection