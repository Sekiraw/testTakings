@extends('master')

@section('title', 'Upload')

@section('content')

    <h1 class="page-header text-center">Test taker {{ $testTaker->testTaker }}</h1>
    <table class="table table-bordered table-responsive table-striped">
        <thead>
            <th>Test taker</th>
            <th>Correct answers</th>
            <th>Incorrect answers</th>
        </thead>

        <tr>
            <td>{{ $testTaker->testTaker }}</td>
            <td>{{ $testTaker->correctAnswers }}</td>
            <td>{{ $testTaker->incorrectAnswers }}</td>
        </tr>
    </table>
@endsection
