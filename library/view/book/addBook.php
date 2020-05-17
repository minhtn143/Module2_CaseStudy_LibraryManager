<?php if (isset($success)): ?>
    <script type="text/javascript">
        myAlert('top', 'success', 'Successfully Added', 1000, './admin.php?page=addBook');
    </script>
<?php endif; ?>
<div class="card bg-light ml-auto mr-auto mt-3" style="width: 700px">
    <div class="card-header bg-primary text-white">
        <h3>Add new book</h3>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xs-12 col-sm-6 my-3">
                <form action="" id="add-book-form" method="post" enctype="multipart/form-data">
                    <!--Thông báo lỗi trùng-->
                    <?php if (isset($errDuplicate)): ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <h5 class="card-title"><?php echo "$errDuplicate"; ?></h5>
                        </div>
                    <?php endif; ?>

                    <!--Nhập tên sách-->
                    <div class="form-group">
                        <label class="col-form-label" for="booktitle"><strong>Book Title: </strong> </label>
                        <input type="text" class="form-control" id="booktitle" name="booktitle"
                               placeholder="Book Title"
                               required>
                    </div>

                    <!--Nhập tên tác giả-->
                    <div class="form-group">
                        <label class="col-form-label" for="booktitle"><strong>Author: </strong> </label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Author"
                               required>
                    </div>

                    <!--Nhập tên loại sách-->
                    <div class="form-group">
                        <label for="subjectId"><strong>Category:</strong></label>
                        <select id="subjectId" class="custom-select" name="subjectId" required>
                            <?php foreach ($category as $item): ?>
                                <option value="<?php echo $item->getId() ?>">
                                    <?php echo $item->getName() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!--Nhập tên Nhà xuất bản-->
                    <div class="form-group">
                        <label for="publisher"><strong>Publisher:</strong></label>
                        <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Publisher">
                    </div>

                    <!--Nhập năm cấp bản quyền -->
                    <div class="form-group">
                        <label for="copyrightYear"><strong>Copyright Year:</strong></label>
                        <input type="number" class="form-control" id="copyrightYear" name="copyrightYear"
                               placeholder="Copyright Year">
                    </div>

                    <div class="form-group">
                        <label for="description"><strong>Description:</strong></label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>

                    <!--Nhập bìa sách-->
                    <div class="form-group">
                        <p class="mb-2"><strong>Book Cover:</strong></p>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="cover" name="cover" placeholder="New cover">
                            <label class="custom-file-label" for="cover">Choose file</label>
                        </div>
                    </div>

                    <!--Button-->
                    <div class="form-inline form-group">
                        <button class="btn-primary btn mr-1" type="submit"><i class="fas fa-plus"></i> Add</button>
                        <button class="btn-secondary btn mr-1" type="reset"><i class="fas fa-undo"></i> Reset</button>
                    </div>
                    <a href="./admin.php" id="cancel"><i class="fas fa-angle-left"></i> Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
