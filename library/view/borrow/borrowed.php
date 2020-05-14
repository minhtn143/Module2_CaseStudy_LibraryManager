<div class="col-md-8 ml-auto mr-auto my-5">
    <div class="card bg-light">
        <div class="card-header bg-primary text-white">
            <h3>Borrowed books</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12 col-sm-6 my-3">
                <form action="" method="post">
                    <div class="form-group">
                        <table class="table text-center my-3">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Date borrowed</th>
                                <th>Due Date</th>
                                <th>Date return</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listBooks as $key => $book): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $book['booktitle']; ?></td>
                                    <td><?php echo $book['dateborrowed']; ?></td>
                                    <td><?php echo $book['duedate']; ?></td>
                                    <td><?php echo $book['datereturned']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>