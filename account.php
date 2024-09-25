<?php
ob_start();
session_start();
$title = "Ihr Konto";

// Ensure that there's no output before this point
include "header.php";

// Assuming user details are stored in the session
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

if (!$user) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}
?>

<div class="container-md">
    <h2 class="">Ihr Konto</h2>
    <div class="row">
        <div class="col-md-6">
            <h5>Persönliche Daten</h5>
            <p><strong>Vorname:</strong> <?php echo htmlspecialchars($user['vorname']); ?></p>
            <p><strong>Nachname:</strong> <?php echo htmlspecialchars($user['nachname']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <a href="edit_account.php" class="btn btn-primary">Konto bearbeiten</a>
            <a href="logout.php" class="btn btn-danger">Abmelden</a>
        </div>
        <div class="col-md-6">
            <h5>Ihre Bestellungen</h5>
            <p><a href="orders.php" class="btn btn-info">Bestellhistorie anzeigen</a></p>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>