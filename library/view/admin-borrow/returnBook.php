<div class="col-md-8 ml-auto mr-auto my-5">
    <div class="card bg-light">
        <div class="card-header bg-primary text-white">
            <h3>Borrow books</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12 col-sm-6 my-3">
                <form action="" method="post">
                    <div class="form-group">
                        <table class="table text-center my-3">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Borrower</th>
                                <th>Book Title</th>
                                <th>Date borrow</th>
                                <th>Due date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($returnBooks as $key => $book): ?>
                                <tr>
                                    <td><input type="checkbox" id="checkbook<?php echo $key ?>" name="checkList[]" value="<?php echo $book['bookId'] ?>"
                                               class="form-check form-check-inline"></td>
                                    <td><?php echo $book['fullname'] ?></td>
                                    <td><?php echo $book['booktitle'] ?></td>
                                    <td><?php echo $book['dateborrowed'] ?></td>
                                    <td><?php echo $book['duedate'] ?></td>
                                    <td><?php echo $book['status'] ?></td>
                                    <input type="hidden" name="ticketId[]" value="<?php echo $book['ticketId'] ?>"
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Accept</button>
                </form>
            </div>
        </div>
    </div>
</div>