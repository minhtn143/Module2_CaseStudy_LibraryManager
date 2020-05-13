<?php
?>
<div class="card bg-light ml-auto mr-auto my-5" style="width: 700px">
    <div class="card-header bg-primary text-white">
        <h3>Change Password</h3>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-6 col-xs-12 col-sm-6 my-3">
                <?php if (isset($errLogin)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo "$errLogin"; ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($block)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo "$block"; ?>
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="cur_psw">Current password:</label>
                        <input type="password" class="form-control" id="cur_psw" name="cur_psw"
                               placeholder="Current password">
                        <p class="error"><?php
                            if (isset($errChange)) {
                                echo $errChange;
                            }
                            ?></p>
                    </div>

                    <div class="form-group">
                        <label for="password">New password:</label>
                        <input type="password" class="form-control" id="password" name="new_psw"
                               placeholder="New password">
                        <p class="pswErr error"></p>
                    </div>

                    <div class="form-group">
                        <label for="re_psw">Re-type new password:</label>
                        <input type="password" class="form-control" id="re_psw" name="re_psw"
                               placeholder="Re-type new password">
                        <p class="retypeErr error"></p>
                    </div>

                    <button type="submit" class="btn btn-primary my-1" name="btn-save"><i class="fas fa-save"></i>
                        Save
                    </button>
                    <button class="btn btn-secondary ml-1" type="button"
                            onclick="location.href='./index.php'"><i
                                class="fas fa-window-close"></i> Cancel
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

