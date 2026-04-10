@extends('layouts.master')

@section('content')

<a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Thêm khóa học</a>

<table class="table">
    <tr>
        <th>Tên</th>
        <th>Giá</th>
        <th>Trạng thái</th>
        <th>Số bài</th>
        <th>Ảnh</th>
        <th></th>
    </tr>

    @foreach($courses as $course)
    <tr>
        <td>{{ $course->name }}</td>
        <td>{{ $course->price }}</td>
        <td>
            <span class="badge bg-{{ $course->status=='published'?'success':'secondary' }}">
                {{ $course->status }}
            </span>
        </td>
        <td>{{ $course->lessons_count }}</td>
        <td>
            @if($course->image)
                <img src="{{ asset('storage/'.$course->image) }}" width="80">
            @endif
        </td>
        <td>
            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Sửa</a>

            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger">Xóa</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $courses->links() }}

@endsection