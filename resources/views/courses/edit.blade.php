@extends('layouts.master')

@section('content')

<form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <input type="text" name="name" value="{{ $course->name }}" class="form-control mb-2">

    <input type="number" name="price" value="{{ $course->price }}" class="form-control mb-2">

    <textarea name="description" class="form-control mb-2">{{ $course->description }}</textarea>

    <input type="file" name="image" class="form-control mb-2">

    <select name="status" class="form-control mb-2">
        <option value="draft" {{ $course->status=='draft'?'selected':'' }}>Draft</option>
        <option value="published" {{ $course->status=='published'?'selected':'' }}>Published</option>
    </select>

    <button class="btn btn-primary">Cập nhật</button>
</form>

@endsection