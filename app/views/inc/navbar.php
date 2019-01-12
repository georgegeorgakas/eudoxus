<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><img class="navbar_logo" src="<?php echo URLROOT; ?>/images/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php echo (isset($view) && $view==='pages/index') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Αρχική</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='pages/announcements') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/announcements">Ανακοινώσεις</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='students/index') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/students/index">Φοιτητής</a>
            </li>
            <li class="nav-item <?php echo (isset($view) && $view==='pages/secretary') ? 'active' : '';?>">
                <a class="nav-link" href="<?php echo URLROOT; ?>/pages/secretary">Γραμματεία</a>
            </li>
            <?php if(isset($_SESSION['id'])) : ?>
                <li class="nav-item <?php echo (isset($view) && $view=== $_SESSION['type'] . '/profile') ? 'active' : '';?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/<?php echo $_SESSION['type']; ?>/profile/<?php echo $_SESSION['username'];?>">Προφίλ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/<?php echo $_SESSION['type']; ?>/logout">Αποσύνδεση</a>
                </li>
            <?php else : ?>
                <li class="nav-item <?php echo (isset($view) && $view=== 'students/register') ? 'active' : '';?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/students/register">Εγγραφή</a>
                </li>
                <li class="nav-item <?php echo (isset($view) && $view==='students/login') ? 'active' : '';?>">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/students/login">Είσοδος</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>