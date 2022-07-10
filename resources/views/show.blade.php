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
                    <tbody id="memberBody">
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

            showMember();

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
                        showMember();
                    }
                });
            });

            $(document).on('click', '.edit', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var correctAnswers = $(this).data('correctAnswers');
                var incorrectAnswers = $(this).data('incorrectAnswers');
                $('#editmodal').modal('show');
                $('#correctAnswers').val(correctAnswers);
                $('#incorrectAnswers').val(incorrectAnswers);
                $('#memid').val(id);
            });

            $(document).on('click', '.delete', function(event){
                event.preventDefault();
                var id = $(this).data('id');
                $('#deletemodal').modal('show');
                $('#deletemember').val(id);
            });

            $('#editForm').on('submit', function(e){
                e.preventDefault();
                var form = $(this).serialize();
                var url = $(this).attr('action');
                $.post(url,form,function(data){
                    $('#editmodal').modal('hide');
                    showMember();
                })
            });

            $('#deletemember').click(function(){
                var id = $(this).val();
                $.post("{{ URL::to('delete') }}",{id:id}, function(){
                    $('#deletemodal').modal('hide');
                    showMember();
                })
            });

        });

        function showMember(){
            $.get("{{ URL::to('show') }}", function(data){
                $('#memberBody').empty().html(data);
            })
        }

    </script>
@endsection
