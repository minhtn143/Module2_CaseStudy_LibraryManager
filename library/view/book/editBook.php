<?php


?>
<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="card" >
                        <h4 class="card-header">
                            <?php echo $book->getTitle(); ?>
                        </h4>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $book->getAuthors(); ?></h5>
                            <p class="card-text"><?php echo $book->getDescription()?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Category: <?php echo $book->getSubjectId()?> </li>
                            <li class="list-group-item">Publisher: <?php echo $book->getPublisher()?></li>
                            <li class="list-group-item">Copyright Year: <?php echo $book->getCopyrightYear()?></li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="card bg-light ml-auto mr-auto my-5" style="width: 700px">
    <div class="card-header bg-primary text-white">
        <h3>Details book</h3>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-md-7 col-xs-12 col-sm-6 my-3">
            <form action="" id="register-form" method="post">
                <div class="form-group">
                    <label for="booktitle">Book Title:</label>
                    <input type="text" class="form-control" id="booktitle" name="booktitle" readonly value="<?php echo $book->getTitle()?>">
                </div>

                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" id="author" name="author" readonly value="<?php echo $book->getAuthors()?>">
                </div>

                <div class="form-group">
                    <label for="subjectId">Category:</label>
                    <input type="text" class="form-control" id="subjectId" name="subjectId" readonly value="<?php echo $book->getSubjectId()?>">
                </div>

                <div class="form-group">
                    <label for="publisher">Publisher:</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" readonly value="<?php echo $book->getPublisher()?>">
                </div>

                <div class="form-group">
                    <label for="copyrightYear">Copyright Year:</label>
                    <input type="text" class="form-control" id="copyrightYear" name="copyrightYear" readonly value="<?php echo $book->getCopyrightYear()?>">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" readonly value="<?php echo $book->getDescription()?>">
                </div>

                <a href="./index.php?page=detailsBook&id=" class="btn btn-primary">Edit</a>
                <a href="./index.php?page=detailsBook&id=" class="btn btn-primary">Delete</a>
                <a href="editBook.php" id="cancel"><i class="fas fa-angle-left"></i> Back</a>

            </form>
        </div>
    </div>
</div>
