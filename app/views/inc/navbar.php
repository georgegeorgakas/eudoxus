<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><img class="navbar_logo" src="<?php echo URLROOT; ?>/images/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo (isset($view) && $view==='pages/index') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Αρχική</a>
            </li><li class="nav-item <?php echo (isset($view) && $view==='pages/search') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/search">Αναζήτηση Βιβλίων</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='pages/announcements') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/announcements">Ανακοινώσεις</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='users/index') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/users/index">Φοιτητής</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='pages/secretary') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/secretary">Γραμματεία</a>
            </li>
            <?php if(isset($_SESSION['id'])) : ?>
                <li class="nav-item <?php echo (isset($view) && $view=== 'users/profile') ? 'active' : '';?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/profile/account">Προφίλ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Αποσύνδεση</a>
                </li>
            <?php else : ?>
                <li class="nav-item <?php echo (isset($view) && $view=== 'users/register') ? 'active' : '';?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/register_type">Εγγραφή</a>
                </li>
                <li class="nav-item <?php echo (isset($view) && $view==='users/login') ? 'active' : '';?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/pages/login_type">Είσοδος</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>