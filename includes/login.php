<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
            </div>
            <div class="card-body">
                <form action="index.php" method="POST">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="email" name="email" required>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" name="password" required>
                    </div>
                    <!--<div class="row align-items-center remember"> // not being used
                        <input type="checkbox">Remember Me
                    </div>-->
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-center text-danger mb-3">
                <?php
                if (isset($_SESSION["error"])) { // checks for errors and outputs them
                    echo $_SESSION["error"];
                    unset($_SESSION["error"]);
                }
                ?>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="./register.php" class="text-primary">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
</div>