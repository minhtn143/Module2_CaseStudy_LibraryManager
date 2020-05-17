<?php
?>
<div class="card bg-light ml-auto mr-auto my-5" style="width: 700px">
    <div class="card-header bg-primary text-white">
        <h3>Edit Profile</h3>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-8 col-xs-12 col-sm-6 my-3">
                <form action="#" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="fullname">Full name:</label>
                        <input type="text" class="form-control" id="fullname" name="fullName" placeholder="Full name"
                               value="<?php echo $user->getFullname(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="birthday">Date of birth:</label>
                        <input type="date" class="form-control" id="birthday" name="dob" placeholder="User name"
                               value="<?php echo $user->getDob(); ?>">
                    </div>


                    <div class="form-group">
                        <p>Gender:</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male"
                                   value="male" <?php if ($user->getGender() == 'male') {
                                echo "checked";
                            } ?>>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female"
                                   value="female" <?php if ($user->getGender() == 'female') {
                                echo "checked";
                            } ?>>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone number:</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number"
                               value="<?php echo $user->getPhone(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                               value="<?php echo $user->getAddress(); ?>">
                    </div>

                    <div class="form-group">
                        <p class="mb-2">Avatar:</p>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatar" name="avatar" placeholder="Avatar">
                            <label class="custom-file-label" for="avatar">Choose file</label>
                        </div>
                    </div>


                    <div class="form-group my-3">
                        <button type="submit" class="btn btn-success my-4" name="btn-save"><i class="fas fa-save"></i>
                            Save
                        </button>
                        <button class="btn-secondary btn" onclick="window.history.back(); return false;"><i
                                    class="fas fa-window-close"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>