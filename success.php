<?php
session_start();
$title = "Vielen Dank für Ihren Kauf!";
include "header.php";

// Ensure the user has just completed a payment
/*
if (!isset($_SESSION['payment_success'])) {
    // If there's no payment success flag in the session, redirect to the home page or another appropriate page
    header('Location: index.php');
    exit();
}
*/
// Clear the payment success flag from the session
unset($_SESSION['payment_success']);
?>

<div class="container text-center">
    <h2>Vielen Dank für Ihren Kauf!</h2>
    <p>Ihre Zahlung war erfolgreich. Wir schätzen Ihr Geschäft.</p>
    <p><a href="index.php" class="btn btn-primary">Weiter einkaufen</a></p>
</div>
</body>
</html>

<?php
include "footer.php";
?>
