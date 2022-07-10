@extends('master')

@section('title', 'Upload')

@section('content')

    <h1 class="page-header text-center">Test taker {{ $testTakerID }}'s records</h1>
    <table class="table table-bordered table-responsive table-striped">
        <thead>
            <th>Test taker</th>
            <th>Correct answers</th>
            <th>Incorrect answers</th>
        </thead>
        @foreach($testTakers as $testTaker)
            <tr>
                <td>{{ $testTaker->testTaker }}</td>
                <td>{{ $testTaker->correctAnswers }}</td>
                <td>{{ $testTaker->incorrectAnswers }}</td>
            </tr>
        @endforeach
    </table>

@endsection
