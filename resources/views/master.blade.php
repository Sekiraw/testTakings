<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test takers page</title>
    @php
        $img = "https://avatars.githubusercontent.com/u/90633951?s=400&u=47b00825c0ce640e97d952492617a56709be451d&v=4"
    @endphp
    <link rel="icon" href="{{ $img }}" type="image/icon type">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
{{--    A nice font--}}
    <style>
        body {
            font-family: 'Average', serif; font-size: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div style="
        background-color: powderblue;
        overflow: hidden;
             padding: 14px;
    ">
        <img src="{{ $img }}" style="
            width: 5%;
            object-fit: contain;
         ">
    Hi TBA21
        <div style="
             float: right;
             text-align: center;
             padding: 14px;
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
