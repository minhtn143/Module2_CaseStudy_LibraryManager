<?php

?>
<div class="table-responsive">
    <caption><strong>LIST BOOKS</strong></caption>
    <!--    display 1-->
    <!--<table class="table table-bordered table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        <?php /*foreach ($books

        as $key => $book): */ ?>
        <tr>
            <th scope="row"><?php /*echo ++$key; */ ?></th>
            <td><?php /*echo $book->getTitle(); */ ?></td>
            <td><?php /*echo $book->getAuthors(); */ ?></td>
            <td><?php /*echo $book->getDescription(); */ ?></td>

            <td>
                <a class="btn btn-primary btn-sm" href="listBook.php?page=update&id=<?php /*echo $book->getId(); */ ?>"
                   role="button">Edit</a>
                <a class="btn btn-danger btn-sm" href="listBook.php?page=delete&id=<?php /*echo $book->getId(); */ ?>"
                   role="button">Delete</a>
                <a class="btn btn-info btn-sm" href="listBook.php?page=details&id=<?php /*echo $book->getId(); */ ?>"
                   role="button">Details</a>
            </td>

            <?php /*endforeach */ ?>
        </tbody>
    </table>-->

    <!--    display2-->

    <?php foreach ($books as $key => $book): ?>
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
                <div class="modal fade" id="details-<?php echo $book->getId() ?>" tabindex="-1" role="dialog"
                     aria-labelledby="details-<?php echo $book->getId() ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Book Details</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

                                <a class="btn btn-primary" href="./index.php?page=editBook&bookId=<?php echo $book->getId(); ?>"
                                   role="button">Edit</a>
                                <a class="btn btn-danger" href="./index.php?page=deleteBook&bookId=<?php echo $book->getId(); ?>"
                                   role="button">Delete</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</div>
