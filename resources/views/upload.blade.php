@extends('master')

@section('title', 'Upload')

@section('content')

    <h1>Upload</h1>

    <form method="post" action="{{ route('upload.store') }}"
        enctype="multipart/form-data">
        @csrf
        <label>Select csv</label>
        <input type="file" class="form-control" required name="file">
        <br>
        <button type="submit" class="btn btn-primary">Upload csv</button>
    </form>

@endsection
