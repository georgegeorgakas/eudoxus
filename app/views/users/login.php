<?php require  APPROOT . '/views/inc/header.php'?>
<div class="row">
    <div class="col-lg-5 col-md-3 gym-title">
        <h1>Eudoxus</h1>
    </div>

    <!--start login form-->
    <div class="col-lg-5 col-md-6 mx-auto mt-5 login">
        <div class="card card-body">
            <?php flash('register_success'); ?>
            <h2 class="mb-4">Login</h2>
            <form id="loginForm" action="<?php echo URLROOT; ?>/users/login/<?php echo $data['type']; ?>" method="post">
                <div class="form-group">
                    <!--<label for="login_credential">Username/Email: <sup>*</sup></label>-->
                    <input type="text"
                           name="login_credential"
                           class="form-control form-control-lg <?php echo (!empty($data['login_credential_error'])) ? 'is-invalid' : ''; ?>"
                           placeholder="username or email"
                           value="<?php echo $data['login_credential']; ?>">
                    <span class="invalid-feedback"><?php echo $data['login_credential_error']; ?></span>
                </div>
                <div class="form-group" id="passwordDiv">
                    <input type="password"
                           name="password"
                           class=" form-control form-control-lg <?php echo (!empty($data['pass_error'])) ? 'is-invalid' : ''; ?>"
                           placeholder="password"
                           value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['pass_error']; ?></span>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <input type="submit" value="Login" class="btn btn-success mt-3 mb-4" style="width:150px;">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end login form-->
</div><!--row-->
<?php require  APPROOT . '/views/inc/footer.php'?>
