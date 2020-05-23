<?php //var_dump($listBooks); ?>
<div class="col-md-8 ml-auto mr-auto my-5">
    <div class="card bg-light">
        <div class="card-header bg-primary text-white">
            <h3>Borrowed books</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12 col-sm-6 my-3">
                <form action="" method="post">
                    <div class="form-group">
                        <table class="table table-striped text-center my-3">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Date borrowed</th>
                                <th>Due Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listBooks as $key => $book): ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><a href="#" data-toggle="modal" data-target="#details-<?php echo $book['bookId'] ?>"><?php echo $book['booktitle']; ?></a></td>
                                    <td><?php echo $book['dateborrowed']; ?></td>
                                    <td><?php echo $book['duedate']; ?></td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="details-<?php echo $book['bookId'] ?>" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="details-<?php $book['bookId'] ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Book Details</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-sm10">
                                                        <div class="card">
                                                            <h4 class="card-header">
                                                                <?php echo $book['booktitle'] ?>
                                                            </h4>
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo $book['bookauthors'] ?></h5>
                                                                <p class="card-text"><?php echo $book['mdescription'] ?></p>
                                                            </div>
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">
                                                                    Publisher: <?php echo $book['publisher'] ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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