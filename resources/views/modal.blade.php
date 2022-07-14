{{--Add new modal--}}
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add New Test Taker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('save') }}" id="addForm">
                    <div class="mb-3">
                        <label for="testTaker">Test taker (xx-xxx-xxxx)</label>
                        <input type="text" name="testTaker" class="form-control" placeholder="Test taker" required>
                    </div>
                    <div class="mb-3">
                        <label for="correctAnswers">Correct Answers</label>
                        <input type="text" name="correctAnswers" class="form-control" placeholder="Correct Answers" required>
                    </div>
                    <div class="mb-3">
                        <label for="incorrectAnswers">Incorrect Answers</label>
                        <input type="text" name="incorrectAnswers" class="form-control" placeholder="Incorrect Answers" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                <div id="addnew_error_message"></div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Test taker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ URL::to('update') }}" id="editForm">
                    <input type="hidden" id="memid" name="id">
                    <div class="mb-3">
                        <label for="testTaker">Test Taker ID (xx-xxx-xxxx)</label>
                        <input type="text" name="testTaker" class="form-control" placeholder="Test taker">
                    </div>
                    <div class="mb-3">
                        <label for="correctAnswers">Correct Answers</label>
                        <input type="text" name="correctAnswers" class="form-control" placeholder="Correct Answers">
                    </div>
                    <div class="mb-3">
                        <label for="incorrectAnswers">Incorrect Answers</label>
                        <input type="text" name="incorrectAnswers" class="form-control" placeholder="Incorrect Answers">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
                <div id="edit_error_message"></div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Delete Test taker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Are you sure?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="deletetesttaker" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Test taker Modal -->
<div class="modal fade" id="testTakerModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Test taker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <h1 class="page-header text-center" id="ttrecords">Test taker xxx's records</h1>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                <th>Test taker</th>
                <th>Correct answers</th>
                <th>Incorrect answers</th>
                </thead>
                    <tr>
                        <td id="uniTestTaker">test taker</td>
                        <td id="uniCorrectAnswers">correct</td>
                        <td id="uniIncorrectAnswers">incorrect</td>
                    </tr>
            </table>
        </div>
    </div>
</div>
