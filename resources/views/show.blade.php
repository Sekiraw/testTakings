@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2>Test Takers</h2>
            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"> New Test taker</button>
        </div>
    </div>
    <div class="row">
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                    <th>Test takers</th>
                    <th>Correct answers</th>
                    <th>Incorrect answers</th>
                    <th>Actions</th>
                </thead>
                    <tbody id="ttBody">
                </tbody>
            </table>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            showTestTaker();

            $('#addForm').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    success: function(){
                        $('#addnew').modal('hide');
                        $('#addForm')[0].reset();
                        $('#addnew_error_message').hide();
                        showTestTaker();
                    },
                    error: function (err) {
                        // a validator egy 422-es errort dob vissza ezt itt lekezelem
                        if (err.status == 422) {
                            $('#addnew_error_message').fadeIn().html(err.responseJSON.message);
                        }
                    }
                });
            });

            $(document).on('click', '.edit', function(e){
                e.preventDefault();
                var id = $(this).data('id');
                var testTaker = $(this).data('testTaker');
                var correctAnswers = $(this).data('correctAnswers');
                var incorrectAnswers = $(this).data('incorrectAnswers');
                $('#editmodal').modal('show');
                $('#correctAnswers').val(correctAnswers);
                $('#incorrectAnswers').val(incorrectAnswers);
                $('#testTaker').val(testTaker);
                $('#memid').val(id);
            });

            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                $('#deletemodal').modal('show');
                $('#deletetesttaker').val(id);
            });

            $(document).on('click', '.showtt', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var testTaker = $(this).data('testtaker');
                var correctAnswers = $(this).data('correct');
                var incorrectAnswers = $(this).data('incorrect');
                $('#testTakerModal').modal('show');
                $('#showTestTaker').html(id);
                $('#uniTestTaker').html(testTaker);
                $('#uniCorrectAnswers').html(correctAnswers);
                $('#uniIncorrectAnswers').html(incorrectAnswers);
                $('#ttrecords').html("Test taker " + testTaker + "'s records");

            });

            $('#editForm').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                // $.post(url, form, function(data){
                //     $('#editmodal').modal('hide');
                //     showTestTaker();
                // })
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    success: function(){
                        $('#editmodal').modal('hide');
                        $('#edit_error_message').hide();
                        showTestTaker();
                    },
                    error: function (err) {
                        // a validator egy 422-es errort dob vissza ezt itt lekezelem
                        if (err.status == 422) {
                            $('#edit_error_message').fadeIn().html(err.responseJSON.message);
                        }
                    }
                });
            });

            $('#deletetesttaker').click(function(){
                var id = $(this).val();
                $.post("{{ URL::to('delete') }}",{id:id}, function(){
                    $('#deletemodal').modal('hide');
                    showTestTaker();
                })
            });

        });

        function showTestTaker(){
            $.get("{{ URL::to('show') }}", function(data){
                $('#ttBody').empty().html(data);
            })
        }

    </script>
@endsection
