<?php require  APPROOT . '/views/inc/header.php'?>
    <ol class="breadcrumb">
        <li><a href="<?php echo URLROOT; ?>">Αρχική Σελίδα&nbsp;</a></li>
        <li class="active">/&nbsp;Δήλωση Βιβλίου</li>
    </ol>
    <hr>
    <!---------------------------------------->

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Ανακοινώσεις</h5>
                        </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Λειτουργία Γραφείου Αρωγής</h5>
                            <small class="text-muted">21/12/2018</small>
                        </div>
                        <p class="mb-1">Σας ενημερώνουμε ότι το Γραφείο Αρωγής Χρηστών δεν θα λειτουργήσει από την Δευτέρα 24/12 έως και την Πέμπτη 27/12</p>
                        <small class="text-muted">2 days ago</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"> Παράταση Περιόδου Δηλώσεων και Διανομής Συγγραμμάτων</h5>
                            <small class="text-muted">20/12/2018</small>
                        </div>
                        <p class="mb-1">Το έγγραφο του Υπουργείου Παιδείας, Έρευνας και
                            Θρησκευμάτων με θέμα την παράταση της περιόδου δήλωσης και διανομής</p>
                        <small class="text-muted">3 days ago</small>
                    </a>
                </div>
            </div>
            <div class="col-sm-8 text-left mt-3">
                <form id="bookForm" action="<?php echo URLROOT; ?>/pages/book/<?php echo $data['book']->idBooks; ?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Τίτλος</label>
                        <input type="text" class="form-control" placeholder="<?php echo $data['book']->title; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Συγγραφέας</label>
                        <input type="text" class="form-control" placeholder="<?php echo $data['book']->author; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Stock</label>
                        <input type="text" class="form-control" placeholder="Απέμειναν <?php echo $data['book']->books_left; ?> βιβλία διαθέσιμα" disabled>
                        <input type="hidden" name="stock" value="<?php echo $data['book']->books_left ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Περιγραφή</label>
                        <input type="text" class="form-control" placeholder="<?php echo $data['book']->description; ?>" disabled>
                    </div>
                    <div class="row mt-2 ml-1">
                        <div class="btn-group mb-3" role="group" aria-label="Second group">
                            <button type="submit"  value="search" class="btn btn-success">Τελική Δήλωση</button>
                        </div>
                    </div>
                    <span class="invalid-feedback"><?php echo isset($data['stock_error']) ? $data['stock_error'] : '' ?></span>
                </form>
            </div>
        </div>
    </div>
    <hr>
<?php require  APPROOT . '/views/inc/footer.php'?>