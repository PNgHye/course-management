@extends('layouts.master')

@section('content')

<a href="{{ route('lessons.create') }}" class="btn btn-primary mb-2">
    Thêm bài học
</a>

<table class="table table-bordered">
    <tr>
        <th>Khóa học</th>
        <th>Tiêu đề</th>
        <th>Video</th>
        <th>Order</th>
        <th>Hành động</th>
    </tr>

    @foreach($lessons as $lesson)
    <tr>
        <td>{{ $lesson->course->name }}</td>
        <td>{{ $lesson->title }}</td>
        <td>{{ $lesson->video_url }}</td>
        <td>{{ $lesson->order }}</td>

        <td>
            <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

@endsection