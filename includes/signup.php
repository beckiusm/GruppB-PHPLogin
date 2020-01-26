<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!--Custom styles-->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">
<link rel="stylesheet" type="text/css" href="../css/loginstyle.css">
<link rel="stylesheet" type="text/css" href="../css/frontpage.css">

<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign UP</h3>
            </div>
            <div class="card-body">
                <form action="checkSignUp.php" method="POST">
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
                    <a href="../" class="btn float-left btn-info">Back</a> 
                  
                    <div class="form-group">
                        <input type="submit" value="Sign up" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-center text-danger">
                <?php
                if (!empty($_SESSION["signup"])) {
                    echo $_SESSION["signup"];
                }
                ?>
            </div>
        </div>
    </div>
</div>