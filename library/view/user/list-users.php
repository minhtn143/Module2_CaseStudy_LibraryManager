<?php

?>
<div class="col-md-8 ml-auto mr-auto">
    <div class="card bg-light my-5">
        <div class="card-header bg-primary text-white">
            <h3>List Users</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12 col-sm-6 my-3">
                    <table class="table text-center my-3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Student ID</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $key => $user): ?>
                            <tr>
                                <input type="hidden" name="id<?php echo $user->getId() ?>"
                                       value="<?php echo $user->getId() ?>">
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $user->getUsername() ?></td>
                                <td class="text-left"><?php echo $user->getFullName() ?></td>
                                <td class="text-left"><?php echo $user->getStudentId() ?></td>
                                <td class="text-center">

                                    <div class="form-check form-check-inline">
                                        <?php if ($user->getStatus() == 'active'): ?>
                                            <p class="text-success"><strong>Active</strong></p>
                                        <?php else: ?>
                                            <p class="text-danger"><strong>Disable</strong></p>
                                        <?php endif; ?>
                                    </div>

                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" id="details"
                                            data-target="#details-<?php echo $user->getId(); ?>"><i
                                                class="far fa-edit"></i>
                                        Details
                                    </button>
                                    <a class="btn btn-success"
                                       href="./admin.php?page=changeStatus&userId=<?php echo $user->getId(); ?>"
                                       role="button">Changer Status</a>
                                </td>
                            </tr>

                        <!-- modal -->
                            <div class="modal fade" id="details-<?php echo $user->getId() ?>" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="details-<?php echo $user->getId() ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">User Details</h3>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-sm10">
                                                <div class="card">
                                                    <h4 class="card-header">
                                                        <?php echo $user->getUsername(); ?>
                                                    </h4>
                                                    <div class="card-body">
                                                        <p class="card-title"><?php echo $user->getFullName(); ?></p>
                                                        <p class="card-text"><?php echo $user->getStudentId() ?></p>

                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">
                                                                Fullname: <?php echo $user->getFullName(); ?> </li>
                                                            <li class="list-group-item">
                                                                StudentId: <?php echo $user->getStudentId() ?> </li>
                                                            <li class="list-group-item">
                                                                Email: <?php echo $user->getEmail() ?> </li>
                                                            <li class="list-group-item">
                                                                Phone: <?php echo $user->getPhone() ?> </li>
                                                            <li class="list-group-item">
                                                                Address: <?php echo $user->getAddress() ?></li>
                                                            <li class="list-group-item">
                                                                Birthday: <?php echo $user->getDob() ?></li>
                                                            <li class="list-group-item">
                                                                Gender: <?php echo $user->getGender() ?></li>
                                                            <li class="list-group-item">
                                                                Status: <?php echo $user->getStatus() ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
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

