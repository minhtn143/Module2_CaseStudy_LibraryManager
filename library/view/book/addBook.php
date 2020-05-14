<?php if (isset($success)): ?>
    <script type="text/javascript">
        myAlert('top', 'success', 'Successfully Added', 1000, './admin.php?page=addBook');
    </script>
<?php endif; ?>
<div class="card bg-light ml-auto mr-auto my-5" style="width: 700px">
    <div class="card-header bg-primary text-white">
        <h3>Add new book</h3>
    </div>

    <div class="row justify-content-center my-4">
        <div class="col-md-7 col-xs-12 col-sm-6 my-3">
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
                    <input type="text" class="form-control" id="booktitle" name="booktitle" placeholder="Book Title"
                           required>
                </div>

                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Author" required>
                </div>

                <div class="form-group">
                    <label for="subjectId">Category:</label>
                    <select id="subjectId" class="form-control" name="subjectId">
                        <?php foreach ($category as $item): ?>
                            <option value="<?php echo $item->getId() ?>">
                                <?php echo $item->getName() ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="publisher">Publisher:</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Publisher">
                </div>

                <div class="form-group">
                    <label for="copyrightYear">Copyright Year:</label>
                    <input type="number" class="form-control" id="copyrightYear" name="copyrightYear"
                           placeholder="Copyright Year">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                </div>

                <button class="btn-primary btn my-3" type="submit"><i class="fas fa-plus-circle"></i> Add
                </button>
                <button class="btn-secondary btn my-3" type="reset"><i class="fas fa-magic"></i> Reset
                </button>
                <a href="./admin.php" id="cancel"><i class="fas fa-angle-left"></i> Back</a>
            </form>
        </div>
    </div>
</div>
