@extends('layouts.master')

@section('content')

<h3>Danh sách học viên theo khóa học</h3>

@foreach($courses as $course)

<div class="card mb-3">
    <div class="card-header">
        <b>{{ $course->name }}</b>
        <span class="badge bg-primary">
            Tổng học viên: {{ $course->students->count() }}
        </span>
    </div>

    <div class="card-body">
        @if($course->students->count() > 0)
            <ul>
                @foreach($course->students as $student)
                    <li>
                        {{ $student->name }} - {{ $student->email }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>Chưa có học viên</p>
        @endif
    </div>
</div>

@endforeach

@endsection