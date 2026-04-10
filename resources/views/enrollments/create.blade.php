@extends('layouts.master')

@section('content')

<h3>Đăng ký khóa học</h3>

<form method="POST" action="{{ route('enrollments.store') }}">
@csrf

<!-- Chọn khóa học -->
<select name="course_id" class="form-control mb-2">
    <option value="">-- Chọn khóa học --</option>
    @foreach($courses as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
    @endforeach
</select>

<!-- Tên học viên -->
<input type="text" name="name" class="form-control mb-2" placeholder="Tên học viên">

<!-- Email -->
<input type="email" name="email" class="form-control mb-2" placeholder="Email">

<button class="btn btn-success">Đăng ký</button>

</form>

@endsection