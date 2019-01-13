<?php require  APPROOT . '/views/inc/header.php'?>
    <div class="row">
        <div class="col-lg-5 col-md-3 gym-title">
            <h1><?php echo SITENAME; ?></h1>
        </div>

        <!--register-->
        <div class="col-lg-6 col-md-8 mx-auto mt-5">
            <div class="card card-body mt-2">
                <h2>Register</h2>
                <form id="registerForm" action="<?php echo URLROOT; ?>/users/register/<?php echo $data['type']; ?>" method="post">

                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <input type="text"
                                   name="first_name"
                                   class="form-control form-control-lg <?php echo (!empty($data['fname_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Name"
                                   value="<?php echo $data['first_name']; ?>">
                            <span class="invalid-feedback"><?php echo $data['fname_error']; ?></span>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text"
                                   name="last_name"
                                   class="form-control form-control-lg <?php echo (!empty($data['lname_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Last Name"
                                   value="<?php echo $data['last_name']; ?>">
                            <span class="invalid-feedback"><?php echo $data['lname_error']; ?></span>
                        </div>
                    </div><!--form-row-->

                    <div class="form-group">
                        <input type="text"
                               name="username"
                               class="form-control form-control-lg <?php echo (!empty($data['username_error'])) ? 'is-invalid' : ''; ?>"
                               placeholder="Username"
                               value="<?php echo $data['username']; ?>">
                        <span class="invalid-feedback"><?php echo $data['username_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="email"
                               name="email"
                               class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                               placeholder="E-mail"
                               value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6" id="passwordDivReg">
                            <input type="password"
                                   name="password"
                                   class="form-control form-control-lg <?php echo (!empty($data['pass_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Password"
                                   value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['pass_error']; ?></span>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="password"
                                   name="confirm_password"
                                   class="form-control form-control-lg <?php echo (!empty($data['confirm_pass_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Confirm Password"
                                   value="<?php echo $data['confirm_password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['confirm_pass_error']; ?></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="text"
                                   name="phone"
                                   class="form-control form-control-lg <?php echo (!empty($data['phone_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Phone"
                                   value="<?php echo $data['phone']; ?>">
                            <span class="invalid-feedback"><?php echo $data['phone_error']; ?></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <input type="text"
                                   name="address"
                                   class="form-control form-control-lg <?php echo (!empty($data['address_error'])) ? 'is-invalid' : ''; ?>"
                                   placeholder="Address"
                                   value="<?php echo $data['address']; ?>">
                            <span class="invalid-feedback"><?php echo $data['address_error']; ?></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="inputGroupSelect01"></label><select name="university" class="form-control form-control-lg" id="inputGroupSelect01">
                                <?php foreach($data['university'] as $key=>$university): ?>
                                    <option value="<?php echo $key ?>"><?php echo $university->name;?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="invalid-feedback"><?php echo $data['university_error']; ?></span>
                        </div>
                    </div><!--form-row-->
                    <div class="row mt-2 ml-1">
                        <div class="btn-group mb-3" role="group" aria-label="Second group">
                            <button type="submit"  value="Register" class="btn btn-success">Register</button>
                        </div>
                    </div>
                    <span class="invalid-feedback"><?php echo $data['register_error']; ?></span>
                </form>
            </div>
        </div>
        <!--end register form-->
    </div>
    <hr>
<?php require  APPROOT . '/views/inc/footer.php'?>