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
                <input class="form-control mr-sm-2 col-10" type="search" placeholder="Search" aria-label="Search"
                       name="keyword">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" name="page" hidden
                       value="searchCategory">
                <button class="btn btn-success my-2 my-sm-0 col-1" type="submit" hidden>Search</button>
            </form>
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
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#details-<?php echo $category->getId() ?>">
                                        <i class="far fa-list-alt"></i> Details
                                    </button>
<!--                                    <a class="text-primary" data-toggle="modal"-->
<!--                                       data-target="#edit-form--><?php //echo $key + 1 ?><!--"><i-->
<!--                                                class="far fa-edit"></i></a> |-->
                                    <a class="text-danger"><i class="far fa-trash-alt"
                                                              onclick="confirmDel('./admin.php?page=delete-category&id=<?php echo $category->getId(); ?>')"></i></a>

                                </td>
                            </tr>



                            <!-- Modal -->
                            <div class="modal fade" id="details-<?php echo $category->getId() ?>" tabindex="-1"
                                 role="dialog" aria-labelledby="details-<?php echo $category->getId() ?>"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Category Details</h3>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-sm10">
                                                <div class="card">
                                                    <h4 class="card-header">
                                                        <?php echo $category->getName(); ?>
                                                    </h4>
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $category->getDescription(); ?></h5>
                                                        <p class="card-text"><?php echo $category->getDescription() ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <?php if ($_SESSION['role'] == 1): ?>
                                                <a class="btn btn-primary"
                                                   href="./admin.php?page=editCategory&categoryId=<?php echo $category->getId(); ?>"
                                                   role="button"><i class="fas fa-edit"></i> Edit</a>
                                                <!--                                                Delete btn-->
                                                <button class="btn btn-danger"
                                                        onclick="confirmDel('./admin.php?page=deleteCategory&categoryId=<?php echo $category->getId(); ?>')">
                                                    <i class="far fa-trash-alt"></i> Delete
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="modal fade" id="#edit-form--><?php //echo $key + 1 ?><!--" tabindex="-1"-->
<!--                                 role="dialog" aria-labelledby="#edit-form--><?php //echo $key + 1 ?><!--"-->
<!--                                 aria-hidden="true">-->
<!--                                <div class="modal-dialog">-->
<!--                                    <div class="modal-content">-->
<!--                                        <div class="modal-header">-->
<!--                                            <h3 class="modal-title" id="#edit-modal--><?php //echo $key + 1 ?><!--">Category Details</h3>-->
<!--                                            <button type="button" class="close" data-dismiss="modal"-->
<!--                                                    aria-label="Close">-->
<!--                                                <span aria-hidden="true">&times;</span>-->
<!--                                            </button>-->
<!--                                        </div>-->
<!--                                        <div class="modal-body">-->
<!--                                            <div class="col-sm10">-->
<!--                                                <div class="card">-->
<!--                                                    <h4 class="card-header">-->
<!--                                                        --><?php //echo $category->getName(); ?>
<!--                                                    </h4>-->
<!--                                                    <div class="card-body">-->
<!--                                                        <p class="card-text">--><?php //echo $category->getDescription() ?><!--</p>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!---->
<!--                                        </div>-->
<!--                                        <div class="modal-footer">-->
<!--                                            --><?php //if ($_SESSION['role'] == 1): ?>
<!--                                                <a class="btn btn-primary"-->
<!--                                                   href="./admin.php?page=editBook&bookId=--><?php //echo $category->getId(); ?><!--"-->
<!--                                                   role="button"><i class="fas fa-edit"></i> Edit</a>-->
<!--                                                <!--                                                Delete btn-->-->
<!--                                                <button class="btn btn-danger"-->
<!--                                                        onclick="confirmDel('./admin.php?page=deleteBook&bookId=--><?php //echo $category->getId(); ?>//')">
//                                                    <i class="far fa-trash-alt"></i> Delete
//                                                </button>
//                                            <?php //endif; ?>
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


