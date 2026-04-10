@extends('layouts.master')

@section('content')

<form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Tên khóa học" class="form-control mb-2">

    <input type="number" name="price" placeholder="Giá" class="form-control mb-2">

    <textarea name="description" placeholder="Mô tả" class="form-control mb-2"></textarea>

    <input type="file" name="image" class="form-control mb-2">

    <select name="status" class="form-control mb-2">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
    </select>

    <button class="btn btn-success">Lưu</button>
</form>

@endsection