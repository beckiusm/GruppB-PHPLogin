<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign Up</h3>
            </div>
            <div class="card-body">
                <form action="?" method="POST">
                <div class="d-flex justify-content-center text-info">
                    <?php
                    if (!empty($_SESSION["signup"])) {
                        echo $_SESSION["signup"];
                    }
                    ?>
                </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="username" name="newUsername" required>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="email" name="newEmail" required>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" name="newPassword" required>
                    </div>
                    <a href="./" class="btn float-left btn-info">Back</a> 
                  
                    <div class="form-group">
                        <input type="submit" value="Sign up" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
           
        </div>
    </div>
</div>