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
                        <table class="table table-striped text-center my-3">
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
                                    <td><input type="checkbox" id="checkbook<?php echo $key ?>" name="checkList[]" value="<?php echo $request['bookId'] ?>"
                                               class="form-check form-check-inline"></td>
                                    <td><label for="checkbook<?php echo $key ?>"><?php echo $request['fullname'] ?></label></td>
                                    <td><label for="checkbook<?php echo $key ?>"><?php echo $request['booktitle'] ?></label></td>
                                    <td><label for="checkbook<?php echo $key ?>"><?php echo $request['dateborrowed'] ?></label></td>
                                    <td><label for="checkbook<?php echo $key ?>"><?php echo $request['duedate'] ?></label></td>
                                    <td><label for="checkbook<?php echo $key ?>"><?php echo $request['status'] ?></label></td>
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