<?php
?>
<div class="col-md-10 ml-auto mr-auto">
    <div class="card my-5">
        <div class="card-header text-center">
            <h2>LIST BOOKS</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($books as $key => $book): ?>
                    <div class="col-md-4 my-3">
                        <div class="card">
                            <h4 class="card-header">
                                <i><?php echo ++$key; ?>.</i>
                                <?php echo $book->getTitle(); ?>
                            </h4>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $book->getAuthors(); ?></h5>
                                <p class="card-text"><?php echo $book->getDescription(); ?></p>

                                <!--Button modal-->
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#details-<?php echo $book->getId() ?>">
                                    Details
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="details-<?php echo $book->getId() ?>" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="details-<?php echo $book->getId() ?>" aria-hidden="true">
                                    <div class="modal-dialog">
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
                                                            <?php echo $book->getTitle(); ?>
                                                        </h4>
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo $book->getAuthors(); ?></h5>
                                                            <p class="card-text"><?php echo $book->getDescription() ?></p>
                                                        </div>
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">
                                                                Category: <?php echo $book->getSubjectId() ?> </li>
                                                            <li class="list-group-item">
                                                                Publisher: <?php echo $book->getPublisher() ?></li>
                                                            <li class="list-group-item">Copyright
                                                                Year: <?php echo $book->getCopyrightYear() ?></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">

                                                <a class="btn btn-primary"
                                                   href="./admin.php?page=editBook&bookId=<?php echo $book->getId(); ?>"
                                                   role="button">Edit</a>
                                                <a style="color: #ff0000"><i class="far fa-trash-alt"
                                                                             onclick="confirmDel('./admin.php?page=deleteBook&bookId=<?php echo $book->getId(); ?>')"></i></a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>