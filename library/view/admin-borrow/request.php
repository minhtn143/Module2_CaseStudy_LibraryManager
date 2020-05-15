<?php //var_dump($listRequests); ?>
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
                            <?php foreach ($listRequests as $key => $request): ?>
                                <tr>
                                    <td><input type="checkbox" id="checkbook<?php echo $key ?>" name="checkList[]" value="<?php echo $request['bookid'] ?>" class="form-check form-check-inline"></td>
                                    <td><?php echo $request['fullname'] ?></td>
                                    <td><?php echo $request['booktitle'] ?></td>
                                    <td><?php echo $request['dateborrowed'] ?></td>
                                    <td><?php echo $request['duedate'] ?></td>
                                    <td><?php echo $request['status'] ?></td>
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