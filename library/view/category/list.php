<?php
?>
<div class="card bg-light ml-auto mr-auto my-5">
    <div class="card-header bg-primary text-white">
        <h3>Add Category</h3>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-7 col-xs-12 col-sm-6 my-3">
                <table class="table text-center my-3">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $key => $category): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $category->getName() ?></td>
                            <td><?php echo $category->getDescription() ?></td>
                            <td><a href="./index.php?page=edit-class&id=<?php echo $klasse->getClassId(); ?>"><i
                                            class="far fa-edit"></i></a> |
                                <a style="color: #ff0000"><i class="far fa-trash-alt"
                                                             onclick="confirmDel('./index.php?page=delete-class&id=<?php echo $klasse->getClassId(); ?>')"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
