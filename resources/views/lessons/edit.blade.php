@extends('layouts.master')

@section('content')

<form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
@csrf
@method('PUT')

<select name="course_id" class="form-control mb-2">
    @foreach($courses as $course)
        <option value="{{ $course->id }}"
            {{ $lesson->course_id == $course->id ? 'selected' : '' }}>
            {{ $course->name }}
        </option>
    @endforeach
</select>

<input type="text" name="title" value="{{ $lesson->title }}" class="form-control mb-2">

<textarea name="content" class="form-control mb-2">{{ $lesson->content }}</textarea>

<input type="text" name="video_url" value="{{ $lesson->video_url }}" class="form-control mb-2">

<input type="number" name="order" value="{{ $lesson->order }}" class="form-control mb-2">

<button class="btn btn-primary">Cập nhật</button>

</form>

@endsection