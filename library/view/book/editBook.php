<?php if (isset($success)): ?>
    <script type="text/javascript">
        myAlert('top', 'success', 'Successfully Edited', 1000, './admin.php?page=listBook');
    </script>
<?php endif; ?>
<div class="card bg-light ml-auto mr-auto mt-2" style="width: 700px">
    <div class="card-header bg-primary text-white">
        <h3>Edit Book</h3>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xs-12 col-sm-6 my-2">
                <form action="" id="register-form" method="post" enctype="multipart/form-data">

                    <?php if (isset($errDuplicate)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo "$errDuplicate"; ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label class="col-form-label" for="booktitle"><strong>Book Title: </strong> </label>
                        <input type="text" class="form-control" id="booktitle" name="booktitle"
                               placeholder="Book Title" readonly
                               value="<?php echo $book->getTitle(); ?>">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="booktitle"><strong>Author: </strong> </label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Author"
                               value="<?php echo $book->getAuthors(); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="subjectId">Category:</label>
                        <select id="subjectId" class="form-control" name="subjectId">
                            <?php foreach ($categories as $category): ?>
                                <?php if ($category->getId() == $book->getSubjectId()): ?>
                                    <option selected value="<?php echo $category->getId() ?>">
                                        <?php echo $category->getName() ?>
                                    </option>
                                <?php else: ?>
                                    <option value="<?php echo $category->getId() ?>">
                                        <?php echo $category->getName() ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="publisher">Publisher:</label>
                        <input type="text" class="form-control" id="publisher" name="publisher"
                               placeholder="Publisher" value="<?php echo $book->getPublisher(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="copyrightYear">Copyright Year:</label>
                        <input type="number" class="form-control" id="copyrightYear" name="copyrightYear"
                               placeholder="Copyright Year" value="<?php echo $book->getCopyrightYear(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"
                                  rows="5"><?php echo $book->getDescription(); ?></textarea>
                    </div>

                        <div class="form-group">
                            <p class="mb-2">Book cover:</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="cover" name="cover" placeholder="New cover">
                                <label class="custom-file-label" for="cover">Choose file</label>
                            </div>
                        </div>

                    <div class="form-group">
                        <div class="form-inline form-group">
                            <button type="submit" class="btn btn-success mr-1" name="btn-save">
                                <i class="fas fa-save"></i> Save
                            </button>
                            <button class="btn-secondary btn mr-1" type="reset"><i class="fas fa-undo"></i> Reset
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-link" type="button" onclick="window.history.back()" id="cancel">
                        <i class="fas fa-angle-left"></i> Back
                    </button>
                </form>
            </div>
        </div>
    </div>