<?php
session_start();
include_once 'Database.php';
$title = "Registrieren";
include "header.php";

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: account.php'); // Redirect to account page if already logged in
    exit;
}

// Instantiate the Database object and establish a connection
$db = Database::getInstance();

// Initialize variables
$error = '';
$vorname = '';
$nachname = '';
$email = '';
$passwort = '';
$passwort_confirm = '';
$strasse = '';
$hausnr = '';
$plz = '';
$ort = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vorname = trim($_POST['vorname']);
    $nachname = trim($_POST['nachname']);
    $email = trim($_POST['email']);
    $passwort = trim($_POST['passwort']);
    $passwort_confirm = trim($_POST['passwort_confirm']);
    $strasse = trim($_POST['strasse']);
    $hausnr = trim($_POST['hausnr']);
    $plz = trim($_POST['plz']);
    $ort = trim($_POST['ort']);

    if (!empty($vorname) && !empty($nachname) && !empty($email) && !empty($passwort) && !empty($passwort_confirm)) {
        if ($passwort === $passwort_confirm) {
            // Check if the email already exists in the database
            $query = 'SELECT COUNT(*) FROM Kunde WHERE email = :email';
            $stmt = $db->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $userExists = $stmt->fetchColumn();

            if (!$userExists) {
                // Hash the password with MD5
                $hashedPasswort = password_hash($passwort, PASSWORD_ARGON2I);

                // Insert the new user into the database
                $query = 'INSERT INTO Kunde (vorname, nachname, email, passwort, strasse, hausnr, plz, ort) VALUES (:vorname, :nachname, :email, :passwort, :strasse, :hausnr, :plz, :ort)';
                $stmt = $db->prepare($query);
                $stmt->bindParam(':vorname', $vorname);
                $stmt->bindParam(':nachname', $nachname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':passwort', $hashedPasswort);
                $stmt->bindParam(':strasse', $strasse);
                $stmt->bindParam(':hausnr', $hausnr);
                $stmt->bindParam(':plz', $plz);
                $stmt->bindParam(':ort', $ort);

                if ($stmt->execute()) {
                    // Registration successful, redirect to login page
                    header('Location: login.php');
                    exit;
                } else {
                    $error = 'Error registering user. Please try again.';
                }
            } else {
                $error = 'An account with that email already exists.';
            }
        } else {
            $error = 'Passwords do not match.';
        }
    } else {
        $error = 'Please fill in all fields.';
    }
}
?>

<div class="container-md mt-5 pt-5">
    <h2 class="mt-4">Registrieren</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    <form method="post" action="register.php">
        <div class="mb-3">
            <label for="vorname" class="form-label">Vorname</label>
            <input type="text" class="form-control" id="vorname" name="vorname" value="<?php echo htmlspecialchars($vorname); ?>" required>
        </div>
        <div class="mb-3">
            <label for="nachname" class="form-label">Nachname</label>
            <input type="text" class="form-control" id="nachname" name="nachname" value="<?php echo htmlspecialchars($nachname); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email-Adresse</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <div class="mb-3">
            <label for="passwort" class="form-label">Passwort</label>
            <input type="password" class="form-control" id="passwort" name="passwort" required>
        </div>
        <div class="mb-3">
            <label for="passwort_confirm" class="form-label">Passwort bestätigen</label>
            <input type="password" class="form-control" id="passwort_confirm" name="passwort_confirm" required>
        </div>
        <div class="mb-3">
            <label for="strasse" class="form-label">Strasse</label>
            <input type="text" class="form-control" id="strasse" name="strasse" value="<?php echo htmlspecialchars($strasse); ?>">
        </div>
        <div class="mb-3">
            <label for="hausnr" class="form-label">Hausnummer</label>
            <input type="text" class="form-control" id="hausnr" name="hausnr" value="<?php echo htmlspecialchars($hausnr); ?>">
        </div>
        <div class="mb-3">
            <label for="plz" class="form-label">PLZ</label>
            <input type="text" class="form-control" id="plz" name="plz" value="<?php echo htmlspecialchars($plz); ?>">
        </div>
        <div class="mb-3">
            <label for="ort" class="form-label">Ort</label>
            <input type="text" class="form-control" id="ort" name="ort" value="<?php echo htmlspecialchars($ort); ?>">
        </div>
        <button type="submit" class="btn btn-primary">registrieren</button>
    </form>
    <p class="mt-3">Sie haben bereits ein Konto? <a href="login.php">Hier anmelden</a>.</p>
</div>
<?php
include "footer.php";
?>