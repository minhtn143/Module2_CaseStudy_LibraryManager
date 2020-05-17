<?php
?>
<div class="col-md-4 mx-auto">
    <div class="card bg-light mt-5">
        <div class="card-header bg-primary text-white">
            <h3>Login</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xs-12 col-sm-6 my-3">
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
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" placeholder="Password"
                                       class="form-control" data-toggle="password">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember-me">
                            <label for="remember-me" class="form-check-label">Remember me</label>
                        </div>

                        <button class="btn-primary btn btn-block my-3" type="submit">
                            <i class="fas fa-sign-in-alt"></i>Login
                        </button>

                        <div class="mb-3 text-muted text-center">
                            <label>
                                <a href="./index.php?page=register">Don't have account? Register</a>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>