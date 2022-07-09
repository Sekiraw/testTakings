<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test takers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"
    rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Test takers list</h1>
        <table class="table table-bordered data-table">
            <thead>
                <tr>Test Taker</tr>
                <tr>Correct answers</tr>
                <tr>Incorrect answers</tr>
                <tr>Actions</tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</body>
<script type="text/javascript">
    var table = $(".data-table").DataTable({
        serverSide:true,
        processing:true,
        ajax:"{{ route('testtakers.index') }}",
        columns: [
            {data: 'testTaker', name:'testTaker'},
            {data: 'correctAnswers', name:'correctAnswers'},
            {data: 'incorrectAnswers', name:'incorrectAnswers'},
        ]
    });
</script>
</html>
