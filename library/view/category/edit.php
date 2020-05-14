<?php if (isset($updateComplete)): ?>
    <script>
        myAlert('center', 'success', 'Update Complete!', 800, './admin.php?page=manage-category')
    </script>
<?php endif; ?>
<div class="card bg-light ml-auto mr-auto my-5" style="width: 700px">
    <div class="card-header bg-primary text-white">
        <h3>Edit Category</h3>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-7 col-xs-12 col-sm-6 my-3">
                <form action="" id="register-form" method="post">
                    <input type="hidden" value="<?php echo $category->getId(); ?>" name="id">
                    <div class="row">
                        <label for="category">Category Name:</label>
                        <input type="text" class="form-control" value="<?php echo $category->getName(); ?>"
                               id="category"
                               name="category"
                               placeholder="Category name">
                        <span class="error"><?php if (isset($_SESSION['nameExist'])) {
                                echo $_SESSION['nameExist'];
                                unset($_SESSION['nameExist']);
                            } ?></span>
                    </div>

                    <div class="row my-3">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description"
                                  rows="5"><?php echo $category->getDescription(); ?></textarea>
                    </div>

                    <div class="row my-3">
                        <button class="btn-primary btn" type="submit"><i class="fas fa-edit"></i>
                            Update
                        </button>
                        <button class="btn btn-secondary ml-1" type="button"
                                onclick="location.href='./admin.php?page=manage-category'"><i
                                    class="fas fa-window-close"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
