<?php require  APPROOT . '/views/inc/header.php'?>
    <!---------------------------------------->
    <ol class="breadcrumb">
        <li><a href="<?php echo URLROOT; ?>">Αρχική Σελίδα&nbsp;</a> </li>
        <li class="active">/&nbsp;Φοιτητής</li>
    </ol>
    <hr>
    <!---------------------------------------->

    <div class="container-fluid text-center">
        <div class="row content">

            <div class="col-sm-2 sidenav">
                <!--<p><a href="#">Link</a></p>
                <p><a href="#">Link</a></p>--
                <p><a href="index.html"><img src="imgs/logo.png" width="100" height="100" alt=""></a></p>-->

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

            <div class="col-sm-8 text-left">
                <button type="button" class="btn btn-primary btn-lg btn-block">Συχνές Ερωτήσεις</button>

                <button type="button" class="btn btn-default btn-lg btn-block" data-toggle="collapse" data-target="#student">Από Φοιτητής</button>
                <div id="student" class="collapse">
                    <!-- LIST -->
                    <ul class="list-group list-group-flush">
                        <button type="button" class="list-group-item" data-toggle="collapse" data-target="#student0">1.Μπορεί ο φοιτητής να δηλώσει και να παραλάβει συγγράμματα για μαθήματα/ θεματικές ενότητες προηγούμενων εξαμήνων;</button></li>
                        <div id="student0" class="collapse">
                            <p>Ναι, εφόσον ο φοιτητής δεν έχει εξεταστεί επιτυχώς στο συγκεκριμένο μάθημα/θεματική ενότητα και δεν έχει παραλάβει ήδη σύγγραμμα για το μάθημα/θεματική ενότητα αυτό τα προηγούμενα εξάμηνα.
                                Ακόμα και αν το σύγγραμμα του μαθήματος/θεματικής ενότητας έχει αλλάξει σε περίπτωση που ο φοιτητής έχει παραλάβει ήδη σύγγραμμα για το εν λόγω μάθημα/θεματική ενότητα στο παρελθόν δεν δικαιούται να παραλάβει νέο σύγγραμμα στο ίδιο μάθημα/θεματική ενότητα.</p>
                        </div>
                        <button type="button" class="list-group-item" data-toggle="collapse" data-target="#student1">2.Τι σημαίνει όταν δίπλα σε κάποιο Σύγγραμμα εμφανίζεται η ένδειξη "Διαθεσιμότητα: 0";</button></li>
                        <div id="student1" class="collapse">
                            <p>Σημαίνει πως δεν υπάρχουν αντίτυπα του Συγγράμματος στο Σημείο Διανομής και ότι ο Εκδότης θα στείλει σύντομα νέα αντίτυπα. Με την άφιξη των νέων αντιτύπων η εφαρμογή ενημερώνεται αυτόματα, οπότε ο Φοιτητής μπορεί ανατρέχοντας στην εφαρμογή να ενημερώνεται για το διαθέσιμο απόθεμα.</p>
                        </div>
                        <button type="button" class="list-group-item" data-toggle="collapse" data-target="#student2">3.Σε περίπτωση απώλειας του προσωπικού κωδικού PIN, πως μπορεί να γίνει η ανάκτησή του;</button></li>
                        <div id="student2" class="collapse">
                            <p>Ο φοιτητής έχει τη δυνατότητα να επιλέξει επαναποστολή του κωδικού PIN από την εφαρμογή του στο "Εύδοξος".  Συγκεκριμένα, από την αρχική σελίδα της εφαρμογής του φοιτητή επιλέγει: "Δηλώσεις Συγγραμμάτων" -> "Ενημέρωση τρέχουσας δήλωσης" ή "Επισκόπηση" για παλιότερη δήλωση -> "Συνέχεια" και στη νέα οθόνη μπορεί να επιλέξει "Υπενθύμιση του αριθμού ΡΙΝ". Το PIN θα εμφανιστεί στην οθόνη του φοιτητή και θα σταλεί και στο e-mail που έχει ορίσει στο "Εύδοξος".</p>
                        </div>
                        <button type="button" class="list-group-item" data-toggle="collapse" data-target="#student3">4.Οι φοιτητές που υποβάλλουν αίτηση μετεγγραφής σε ποιο τμήμα δικαιούνται να δηλώσουν Συγγράμματα;</button></li>
                        <div id="student3" class="collapse">
                            <p>Οι φοιτητές ή σπουδαστές, που υποβάλλουν αίτηση μετεγγραφής στις Γραμματείες των Τμημάτων και επέλεξαν διδακτικά συγγράμματα μέσω του πληροφοριακού συστήματος “ΕΥΔΟΞΟΣ”, τα οποία προμηθεύτηκαν ενόσω φοιτούσαν ή σπούδαζαν στο Τμήμα προέλευσης, έχουν την δυνατότητα αφότου μετεγγραφούν στο Τμήμα υποδοχής να επιλέξουν εκ νέου συγγράμματα μέσω του ιδίου πληροφοριακού συστήματος. Οι μετεγγραφόμενοι φοιτητές ή σπουδαστές, που εξετάστηκαν ήδη στο Τμήμα προέλευσης, οφείλουν να δηλώσουν στο πληροφοριακό σύστημα μόνο τον αριθμό των μαθημάτων για τα οποία έχουν παραλάβει συγγράμματα και κατά την κρίση της Γενικής Συνέλευσης του Τμήματος υποδοχής απαλλάσσονται από την εξέταση τους. Εάν οι υποβάλλοντες αίτηση μετεγγραφής βρίσκονται στο πρώτο εξάμηνο σπουδών και δεν έχουν εξεταστεί στο τμήμα προέλευσης, τότε θα δηλώνουν μηδενικό αριθμό μαθημάτων.
                                Οι φοιτητές ή σπουδαστές,  που υποβάλλουν ηλεκτρονικά αίτηση μετεγγραφής, δικαιούνται να επιλέξουν συγγράμματα μέσω του ίδιου πληροφοριακού συστήματος, μόνο αφού εγγραφούν στο Τμήμα υποδοχής.</p>
                        </div>
                        <button type="button" class="list-group-item" data-toggle="collapse" data-target="#student4">5.Μπορεί ο φοιτητής να επιλέξει Συγγράμματα και για άλλη περίοδο;</button></li>
                        <div id="student4" class="collapse">
                            <p>Όχι, ο φοιτητής μπορεί να δηλώσει μόνο συγγράμματα/σειρές συγγραμμάτων για τα μαθήματα τα οποία ανήκουν στην τρέχουσα περίοδο, χειμερινή ή εαρινή.</p>
                        </div>
                    </ul>
                </div>
                <hr>

                <div class="row">
                    <div class="col-sm-4">
                        <h3>Eνημερωτικό video</h3>
                        <p><a href="#"><img src="<?php echo URLROOT; ?>/images/VideoBanner.png" alt="video"></a></p>
                    </div>
                    <div class="col-sm-4">
                        <h3>Συχνές Ερωτήσεις</h3>
                        <p><a href="#"><img src="<?php echo URLROOT; ?>/images/FAQBanner.png" alt="video"></a></p>
                    </div>
                    <div class="col-sm-4">
                        <h3>Υποβάλετε το ερώτημα σας</h3>
                        <p><a href="#"><img src="<?php echo URLROOT; ?>/images/HelpDeskBanner.png" alt="video"></a></p>
                    </div>
                    <div class="col-sm-4">
                        <h3>EYDOXUS+ video</h3>
                        <p><a href="#"><img src="<?php echo URLROOT; ?>/images/EudoxusPlusVideoBanner.png" alt="video"></a></p>
                    </div>
                    <div class="col-sm-4">
                        <h3>Αναζήτηση Βιβλίων</h3>
                        <p><a href="#"><img src="<?php echo URLROOT; ?>/images/SearchBookBanner.png" alt="video"></a></p>
                    </div>
                    <div class="col-sm-4">
                        <h3>Επιλεγμένα Συγγράμματα</h3>
                        <p><a href="#"><img src="<?php echo URLROOT; ?>/images/SelectedBooksBanner.png" alt="video"></a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <hr>
<?php require  APPROOT . '/views/inc/footer.php'?>