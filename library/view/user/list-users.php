<?php

?>
<div class="col-md-12 ml-auto mr-auto">
    <div class="card bg-light my-5">
        <div class="card-header bg-primary text-white">
            <h3>List Users</h3>
        </div>
        <div class="card-body">
            <!--            Search bar-->
            <form class="form-inline my-2 my-lg-0 justify-content-center">
                <input class="form-control mr-sm-2 col-10" type="search" placeholder="Search" aria-label="Search" name="keyword">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" name="page" hidden value="searchUser">
                <button class="btn btn-success my-2 my-sm-0 col-1" type="submit" hidden>Search</button>
            </form>
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12 col-sm-6 my-3">
                    <table class="table text-center my-3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Student ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact</th>
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
                                <td><?php echo $user->getStudentId() ?></td>
                                <td><?php echo $user->getFullName() ?></td>
                                <td><?php echo $user->getEmail() ?></td>
                                <td><?php echo $user->getPhone() ?></td>
                                <td>

                                    <div class="form-check form-check-inline">
                                        <?php if ($user->getStatus() == 'active'): ?>
                                            <p class="text-success"><strong>Active</strong></p>
                                        <?php else: ?>
                                            <p class="text-danger"><strong>Disable</strong></p>
                                        <?php endif; ?>
                                    </div>

                                </td>
                                <td>
                                    <a class="btn btn-success"
                                       href="./admin.php?page=changeStatus&userId=<?php echo $user->getId(); ?>"
                                       role="button">Change Status</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

