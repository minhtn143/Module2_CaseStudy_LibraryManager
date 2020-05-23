<div class="col-md-8 ml-auto mr-auto my-5">
    <div class="card bg-light">
        <div class="card-header bg-primary text-white">
            <h3>Borrow History</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12 col-sm-6 my-3">
                <div class="form-group">
                    <table class="table table-striped text-center my-3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Book Title</th>
                            <th>Date borrowed</th>
                            <th>Due date</th>
                            <th>Date returned</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($userReturned as $key => $ticket): ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $ticket['booktitle'] ?></td>
                                <td><?php echo $ticket['dateborrowed'] ?></td>
                                <td><?php echo $ticket['duedate'] ?></td>
                                <td><?php echo $ticket['datereturned'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>