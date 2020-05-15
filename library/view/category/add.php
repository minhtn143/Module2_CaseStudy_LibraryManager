<?php if (isset($success)): ?>
    <script type="text/javascript">
        myAlert('top', 'success', 'Successfully Added', 1000,'./admin.php?page=add-category');
    </script>
<?php endif; ?>
<div class="card bg-light ml-auto mr-auto my-5" style="width: 700px">
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
                    <div class="row my-1">
                        <div class="form-inline form-group">
                            <button class="btn-primary btn mr-1" type="submit"><i class="fas fa-plus"></i> Add</button>
                            <button class="btn-secondary btn mr-1" type="reset"><i class="fas fa-undo"></i> Reset</button>
                        </div>
                    </div>
                    <a href="./admin.php" id="cancel"><i class="fas fa-angle-left"></i> Back</a>
                </form>
            </div>
        </div>
    </div>
</div>