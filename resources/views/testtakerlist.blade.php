@foreach($testTakers as $testTaker)
    <tr>
        <td>{{ $testTaker->testTaker }}</td>
        <td>{{ $testTaker->correctAnswers }}</td>
        <td>{{ $testTaker->incorrectAnswers }}</td>
        <td><a href='#' class='btn btn-success edit' data-id='{{ $testTaker->id }}' data-first='{{ $testTaker->testTaker }}'> Edit</a>
            <a href='#' class='btn btn-danger delete' data-id='{{ $testTaker->id }}'> Delete</a>
        </td>
    </tr>
@endforeach
