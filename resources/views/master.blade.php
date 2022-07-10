<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test takers page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div style="
        background-color: powderblue;
        overflow: hidden;
    ">
    Hi TBA21
        <div style="
             float: right;
        ">
            <a href="/">Show</a>
            <a href="/upload">Upload</a>
            <a href="/diagram">Diagram</a>
        </div>
    </div>

    @yield('content')
</div>
@include('modal')

@yield('script')
</body>
</html>
