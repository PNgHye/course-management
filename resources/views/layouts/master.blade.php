<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Course Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #83a9e3;
            color: white;
            padding-top: 20px;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.2);
            padding-left: 25px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .brand {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="brand">📚 COURSE SYSTEM</div>

    <a href="{{ route('courses.index') }}">🏫 Quản lý khóa học</a>
    <a href="{{ route('lessons.index') }}">📖 Quản lý bài học</a>
    <a href="{{ route('enrollments.index') }}">👨‍🎓 Quản lý đăng ký</a>
</div>

<!-- CONTENT -->
<div class="content">
    @yield('content')
</div>

</body>
</html>