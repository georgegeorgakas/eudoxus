<?php require  APPROOT . '/views/inc/header.php'?>
    <div class="row profile">
        <div class="col-md-2 sidemenu">
            <div class="list-group">
                <a href="<?php echo URLROOT; ?>/users/profile/account" class="list-group-item <?php echo ($data['tab'] === 'account') ? 'active_profile_tab' : ''; ?>">Λογαριασμός</a>
                <a href="<?php echo URLROOT; ?>/users/profile/books" class="list-group-item <?php echo ($data['tab'] === 'books') ? 'active_profile_tab' : ''; ?>">Τα Βιβλία μου</a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row main_profile">

                <!-- This is the display for users info -->
                <?php if($data['tab'] === 'account')  : ?>
                    <div class="col-md-11 profile_boxes">
                        <h4>Tα στοιχεία μου</h4>
                        <?php flash('update_details_success'); ?>
                        <form id="updateDetailsForm" action="<?php echo URLROOT; ?>/users/updateDetails" method="post">
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <input type="text"
                                           name="name"
                                           class="form-control form-control-lg <?php echo (isset($data['name_error']) && !empty($data['name_error'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $_SESSION['first_name']; ?>">
                                    <span class="invalid-feedback"><?php echo isset($data['name_error']) ? $data['name_error'] : ''; ?></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="text"
                                           name="last_name"
                                           class="form-control form-control-lg <?php echo (isset($data['last_name_error']) && !empty($data['last_name_error'])) ? 'is-invalid' : ''; ?>"
                                           placeholder="<?php echo isset($data['last_name']) ? $data['last_name'] : ''; ?>"
                                           value="<?php echo $_SESSION['last_name'] ?>">
                                    <span class="invalid-feedback"><?php echo isset($data['last_name_error']) ? $data['last_name_error'] : ''; ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="tel"
                                       name="phone"
                                       class="form-control form-control-lg <?php echo (isset($data['phone_error']) && !empty($data['phone_error'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="<?php echo isset($_SESSION['phone']) ? '' : 'Enter your Phone number'; ?>"
                                       value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>">
                                <span class="invalid-feedback"><?php echo isset($data['phone_error']) ? $data['phone_error'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                       name="address"
                                       class="form-control form-control-lg <?php echo (isset($data['address_error']) && !empty($data['address_error'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="<?php echo isset($_SESSION['address']) ? '' : 'Enter your address'; ?>"
                                       value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>">
                                <span class="invalid-feedback"><?php echo isset($data['address_error']) ? $data['address_error'] : ''; ?></span>
                            </div>
                            <div class="btn-group ml-3 mb-3" role="group" aria-label="Second group">
                                <button type="submit"  value="Register" class="btn btn-success">Αλλαγή Στοιχείων</button>
                            </div>
                            <span class="invalid-feedback"><?php echo isset($data['']) ? $data[''] : ''; ?></span>
                        </form>
                    </div>
                    <div class="col-md-5 profile_boxes mt-4">
                        <h4>Username</h4>
                        <?php flash('update_username_success'); ?>
                        <form id="updateUsernameForm" action="<?php echo URLROOT; ?>/users/updateUsername" method="post">
                            <div class="form-group">
                                <input type="text"
                                       name="disable_username"
                                       class="form-control form-control-lg <?php echo (isset($data['username_error']) && !empty($data['username_error'])) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $_SESSION['username']; ?>" disabled>
                                <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                                <span class="invalid-feedback"><?php echo isset($data['username_error']) ? $data['username_error'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                       name="new_username"
                                       class="form-control form-control-lg <?php echo (isset($data['new_username_error']) && !empty($data['new_username_error'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="Νέος Κωδικός"
                                       value="<?php echo isset($data['new_username']) ? $data['new_username'] : ''; ?>">
                                <span class="invalid-feedback"><?php echo isset($data['new_username_error']) ? $data['new_username_error'] : ''; ?></span>
                            </div>
                            <div class="btn-group ml-3 mb-3" role="group" aria-label="Second group">
                                <button type="submit"  value="Register" class="btn btn-success">Αλλαγή Username</button>
                            </div>
                            <span class="invalid-feedback"><?php echo isset($data['update_error']) ? $data['update_error'] : ''; ?></span>
                        </form>
                    </div>
                    <div class="col-md-5 offset-1 profile_boxes mt-4">
                        <h4>E-mail</h4>
                        <?php flash('update_mail_success'); ?>
                        <form id="updateEmailForm" action="<?php echo URLROOT; ?>/users/updateEmail" method="post">
                            <div class="form-group">
                                <input type="text"
                                       name="disabled_mail"
                                       class="form-control form-control-lg <?php echo (isset($data['email_error']) && !empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                                       value="<?php echo $_SESSION['email']; ?> " disabled>
                                <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                                <span class="invalid-feedback"><?php echo isset($data['email_error']) ? $data['email_error'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                       name="new_email"
                                       class="form-control form-control-lg <?php echo (isset($data['new_email_error']) && !empty($data['new_email_error'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="Νέο E-mail"
                                       value="<?php echo isset($data['new_email']) ? $data['new_email'] : ''; ?>">
                                <span class="invalid-feedback"><?php echo isset($data['new_email_error']) ? $data['new_email_error'] : ''; ?></span>
                            </div>
                            <div class="btn-group ml-3 mb-3" role="group" aria-label="Second group">
                                <button type="submit"  value="Register" class="btn btn-success">Αλλαγή E-mail</button>
                            </div>
                            <span class="invalid-feedback"><?php echo isset($data['update_error']) ? $data['update_error'] : ''; ?></span>
                        </form>
                    </div>
                    <div class="col-md-5 profile_boxes mt-4">
                        <h4>Password</h4>
                        <?php flash('update_password_success'); ?>
                        <form id="updatePasswordForm" action="<?php echo URLROOT; ?>/users/updatePassword" method="post">
                            <div class="form-group">
                                <input type="password"
                                       name="password"
                                       class="form-control form-control-lg <?php echo (isset($data['password_error']) && !empty($data['password_error'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="Ο Κωδικός σας"
                                       value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>">
                                <span class="invalid-feedback"><?php echo isset($data['password_error']) ? $data['password_error'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="password"
                                       name="new_password"
                                       class="form-control form-control-lg <?php echo (isset($data['new_password_error']) && !empty($data['new_password_error'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="Νέος Κωδικός"
                                       value="<?php echo isset($data['new_password']) ? $data['new_password'] : ''; ?>">
                                <span class="invalid-feedback"><?php echo isset($data['new_password_error']) ? $data['new_password_error'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="password"
                                       name="confirm_password"
                                       class="form-control form-control-lg <?php echo (isset($data['confirm_password_error']) && !empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>"
                                       placeholder="Επιβεβαίωση Νέου Κωδικού"
                                       value="<?php echo isset($data['confirm_password']) ? $data['confirm_password'] : ''; ?>">
                                <span class="invalid-feedback"><?php echo isset($data['confirm_password_error']) ? $data['confirm_password_error'] : ''; ?></span>
                            </div>
                            <div class="btn-group ml-3 mb-3" role="group" aria-label="Second group">
                                <button type="submit"  value="Register" class="btn btn-success">Αλλαγή Password</button>
                            </div>
                            <span class="invalid-feedback"><?php echo isset($data['update_error']) ? $data['update_error'] : ''; ?></span>
                        </form>
                    </div>

                    <!-- This is the display for gym details upload -->
                <?php elseif ($data['tab'] === 'books') : ?>
                    <div class="col-md-12 profile_boxes">
                        <h4>Τα βιβλία μου</h4>
                    </div>

                    <!-- It should should never reach this display but just in case -->
                <?php else: ?>
                    <div>
                        <h1>Something went wrong.</h1>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php require  APPROOT . '/views/inc/footer.php'?>