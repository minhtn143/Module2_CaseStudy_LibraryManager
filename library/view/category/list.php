<?php if (isset($updateComplete)): ?>
    <script>
        myAlert('center', 'success', 'Update Complete!', 800, './admin.php?page=manage-category')
    </script>
<?php endif; ?>
<div class="col-md-12 ml-auto mr-auto">
    <div class="card bg-light my-5">
        <div class="card-header bg-primary text-white">
            <h3>List Categories</h3>
        </div>
        <div class="card-body">
            <!--            Search bar-->
            <form class="form-inline my-2 my-lg-0 justify-content-center">
                <input class="form-control mr-sm-2 col-10" type="search" placeholder="Search" aria-label="Search" name="keyword">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" name="page" hidden value="searchCategory">
                <button class="btn btn-success my-2 my-sm-0 col-1" type="submit" hidden>Search</button>
            </form>
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12 col-sm-6 my-3">
                    <table class="table table-striped text-center my-3">
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
                                <td>

                                    <button class="btn btn-primary" data-toggle="modal" data-target="#edit-form<?php echo $key + 1 ?>"><i
                                                role="button" class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger"
                                            onclick="confirmDel('./admin.php?page=delete-category&id=<?php echo $category->getId(); ?>')">
                                        <i class="far fa-trash-alt"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            <!--                            <div class="col-md-12">-->
                            <div class="modal fade" id="edit-form<?php echo $key + 1 ?>" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Edit Category</h3>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-10 ml-auto mr-auto">
                                                <form action="./admin.php?page=edit-category&id=<?php echo $category->getId(); ?>"
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
                                                                    class="fas fa-save"></i>
                                                            Save
                                                        </button>
                                                        <button class="btn-secondary btn ml-1" type="reset"><i class="fas fa-undo"></i> Reset

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                            </div>-->
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
