<?php if (isset($updateComplete)): ?>
    <script>
        myAlert('center', 'success', 'Update Complete!', 800, './admin.php?page=manage-category')
    </script>
<?php endif; ?>

<div class="col-md-8 ml-auto mr-auto">
    <div class="card bg-light my-5">
        <div class="card-header bg-primary text-white">
            <h3>List Categories</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12 col-sm-6 my-3">
                    <table class="table text-center my-3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $key => $category): ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $category->getName() ?></td>
                                <td style="width: 600px"
                                    class="text-left"><?php echo $category->getDescription() ?></td>
                                <td><a class="text-primary" data-toggle="modal" data-target="#test"><i
                                                class="far fa-edit"></i></a> |
                                    <a class="text-danger"><i class="far fa-trash-alt"
                                                              onclick="confirmDel('./admin.php?page=delete-category&id=<?php echo $category->getId(); ?>')"></i></a>

                                </td>
                            </tr>
                            <div class="modal fade" id="test" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel">
                                <div class="card bg-light ml-auto mr-auto my-5" style="width: 700px">
                                    <div class="card-header bg-primary text-white">
                                        <h3>Edit Category</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-md-7 col-xs-12 col-sm-6 my-3">
                                                <form action="./admin.php?page=edit-category&id=--><?php echo $category->getId(); ?>"
                                                      id="register-form" method="post">
                                                    <input type="hidden" value="<?php echo $category->getId(); ?>"
                                                           name="id">
                                                    <div class="row">
                                                        <label for="category">Category Name:</label>
                                                        <input type="text" class="form-control" readonly
                                                               value="<?php echo $category->getName(); ?>"
                                                               id="category"
                                                               name="category"
                                                               placeholder="Category name">
                                                    </div>

                                                    <div class="row my-3">
                                                        <label for="description">Description:</label>
                                                        <textarea class="form-control" id="description"
                                                                  name="description"
                                                                  placeholder="Description"
                                                                  rows="7"><?php echo $category->getDescription(); ?></textarea>
                                                    </div>

                                                    <div class="row my-3">
                                                        <button class="btn-primary btn" type="submit"><i
                                                                    class="fas fa-edit"></i>
                                                            Update
                                                        </button>
                                                        <button class="btn btn-secondary ml-1" type="button"
                                                                onclick="location.href='./admin.php?page=manage-category'">
                                                            <i
                                                                    class="fas fa-window-close"></i> Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<a href="./admin.php?page=edit-category&id=--><?php //echo $category->getId(); ?><!--"><i-->
<!--            class="far fa-edit"></i></a>-->

