<?php if (isset($success)): ?>
    <script type="text/javascript">
        myAlert('top', 'success', 'Successfully Edited', 1000, './admin.php');
    </script>
<?php endif; ?>
<div class="card bg-light ml-auto mr-auto my-5" style="width: 700px">

    <div class="card bg-light ml-auto mr-auto" style="width: 700px">
        <div class="card-header bg-primary text-white">
            <h3>Edit Book</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xs-12 col-sm-6 my-3">
                    <form action="" id="register-form" method="post">
                        <div class="form-group">
                            <?php if (isset($errDuplicate)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo "$errDuplicate"; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="booktitle">Book Title:</label>
                            <input type="text" class="form-control" id="booktitle" name="booktitle"
                                   placeholder="Book Title"
                                   value="<?php echo $book->getTitle(); ?>">
                        </div>

                        <div class="form-group">
                            <label for="author">Author:</label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Author"
                                   value="<?php echo $book->getAuthors(); ?>">
                        </div>

                        <div class="form-group">
                            <label for="subjectId">Category:</label>
                            <select id="subjectId" class="form-control" name="subjectId">
                                <selected>
                                    chossen
                                    <?php

                                    ?>
                                </selected>
                                <?php foreach ($category as $item): ?>
                                    <option value="<?php echo $item->getId() ?>">
                                        <?php echo $item->getName() ?>
                                    </option>
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
                        <div class="form-inline form-group">
                            <button type="submit" class="btn btn-success mr-1" name="btn-save"><i
                                        class="fas fa-save"></i>
                                Save
                            </button>
                            <button class="btn-secondary btn" type="reset"><i class="fas fa-magic"></i> Reset
                            </button>
                        </div>
                        <a href="./admin.php" id="cancel"><i class="fas fa-angle-left"></i> Back</a>
                    </form>
                </div>
            </div>
        </div>