<?php
?>
<div class="card bg-light ml-auto mr-auto my-5" style="width: 700px">
    <div class="card-header bg-primary text-white">
        <h3>Register form</h3>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-md-7 col-xs-12 col-sm-6 my-3">
            <?php if (isset($errRegister)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "$errRegister"; ?>
                </div>
            <?php endif; ?>
            <form action="" id="register-form" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    <div class="userErr text-danger"></div>
                </div>

                <div class="form-group">
                    <label for="studentId">Student ID:</label>
                    <input type="text" class="form-control" id="studentId" name="studentId" placeholder="Username">
                    <div class="idErr text-danger"></div>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Username">
                    <div class="emailErr text-danger"></div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Username">
                    <div class="phoneErr text-danger"></div>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                    <div class="pswErr text-danger"></div>
                </div>

                <div class="form-group">
                    <label for="re_psw">Re-type password:</label>
                    <input type="password" id="re_psw" name="re_psw" placeholder="Re-type password" class="form-control">
                    <div class="retypeErr text-danger"></div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember-me" required>
                    <label for="remember-me" class="form-check-label">
                    <span>By creating an account you agree to our <a href="#"
                                                                     style="color:dodgerblue">Terms & Privacy</a>.</span>
                    </label>
                </div>

                <button class="btn-primary btn my-3 btn-block" type="submit"><i class="fas fa-user-plus"></i> Register</button>

                <div class="mb-3 text-muted text-center">
                    <label>
                        <a href="./index.php?page=login" class="stretched-link">Already have an account? Login</a>
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>
