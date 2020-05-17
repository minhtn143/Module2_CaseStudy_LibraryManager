<?php if (isset($success)): ?>
    <script type="text/javascript">
        myAlert('top', 'success', 'Successfully Added', 1000, './admin.php?page=add-category');
    </script>
<?php endif; ?>
<div class="col-md-4 col-sm-12 col-xs-12 mx-auto my-5">
    <div class="card bg-light">
        <div class="card-header bg-primary text-white">
            <h3>Add Category</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-7 col-xs-12 col-sm-6 my-3">
                    <form action="" id="register-form" method="post">
                        <div class="row">
                            <label for="category">Category Name:</label>
                            <input type="text" class="form-control" id="category" name="category"
                                   placeholder="Category name">
                            <span class="error"><?php if (isset($nameExist)) {
                                    echo $nameExist;
                                } ?></span>
                        </div>

                        <div class="row my-3">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description"
                                      rows="5"></textarea>
                        </div>

                        <div class="row my-3">
                            <button class="btn-primary btn" type="submit"><i class="fas fa-plus-circle"></i>
                                Add
                            </button>
                            <button class="btn btn-secondary ml-1" type="button" onclick="window.location='./admin.php'"><i
                                        class="fas fa-window-close"></i> Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>