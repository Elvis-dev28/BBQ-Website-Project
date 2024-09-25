<?php
session_start();
$title = "Konto bearbeiten";
include "header.php";

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Instantiate the Database object and establish a connection
$db = Database::getInstance();

// Initialize variables
$user_id = $_SESSION['user']['id'];
$error = '';
$success = '';

// Fetch the current user data
$query = 'SELECT * FROM Kunde WHERE id = :user_id';
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header('Location: account.php'); // Redirect if user not found
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vorname = trim($_POST['vorname']);
    $nachname = trim($_POST['nachname']);
    $email = trim($_POST['email']);
    $strasse = trim($_POST['strasse']);
    $hausnr = trim($_POST['hausnr']);
    $plz = trim($_POST['plz']);
    $ort = trim($_POST['ort']);
    $passwort = trim($_POST['passwort']);
    $new_passwort = trim($_POST['new_passwort']);

    // Validate input
    if (empty($vorname) || empty($nachname) || empty($email)) {
        $error = 'Please fill in all required fields.';
    } elseif ($passwort && !password_verify($passwort, $user['passwort'])) {
        $error = 'Current password is incorrect.';
    } elseif ($passwort && $new_passwort) {
        // Update password
        $passwort = password_hash($new_passwort, PASSWORD_DEFAULT);
        $update_query = 'UPDATE Kunde SET vorname = :vorname, nachname = :nachname, email = :email, strasse = :strasse, hausnr = :hausnr, plz = :plz, ort = :ort, passwort = :passwort WHERE id = :user_id';
        $update_stmt = $db->prepare($update_query);
        $update_stmt->bindParam(':passwort', $passwort);
    } else {
        // Update without changing password
        $update_query = 'UPDATE Kunde SET vorname = :vorname, nachname = :nachname, email = :email, strasse = :strasse, hausnr = :hausnr, plz = :plz, ort = :ort WHERE id = :user_id';
        $update_stmt = $db->prepare($update_query);
    }

    if ($error == '') {
        $update_stmt->bindParam(':vorname', $vorname);
        $update_stmt->bindParam(':nachname', $nachname);
        $update_stmt->bindParam(':email', $email);
        $update_stmt->bindParam(':strasse', $strasse);
        $update_stmt->bindParam(':hausnr', $hausnr);
        $update_stmt->bindParam(':plz', $plz);
        $update_stmt->bindParam(':ort', $ort);
        $update_stmt->bindParam(':user_id', $user_id);

        if ($update_stmt->execute()) {
            $_SESSION['user'] = [
                'id' => $user_id,
                'email' => $email,
                'vorname' => $vorname,
                'nachname' => $nachname,
            ];
            $success = 'Account information updated successfully.';
            // Redirect to the same page to show updated information
            header('Location: edit_account.php');
            exit;
        } else {
            $error = 'Failed to update account information.';
        }
    }

}
?>

<div class="container-md">
    <h2 class="">Konto bearbeiten</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="alert alert-success" role="alert">
            <?php echo htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>
    <form method="post" action="edit_account.php">
        <div class="mb-3">
            <label for="vorname" class="form-label">Vorname</label>
            <input type="text" class="form-control" id="vorname" name="vorname" value="<?php echo htmlspecialchars($user['vorname']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="nachname" class="form-label">Nachname</label>
            <input type="text" class="form-control" id="nachname" name="nachname" value="<?php echo htmlspecialchars($user['nachname']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Emailadresse</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="strasse" class="form-label">Straße</label>
            <input type="text" class="form-control" id="strasse" name="strasse" value="<?php echo htmlspecialchars($user['strasse']); ?>">
        </div>
        <div class="mb-3">
            <label for="hausnr" class="form-label">Hausnummer</label>
            <input type="text" class="form-control" id="hausnr" name="hausnr" value="<?php echo htmlspecialchars($user['hausnr']); ?>">
        </div>
        <div class="mb-3">
            <label for="plz" class="form-label">PLZ</label>
            <input type="text" class="form-control" id="plz" name="plz" value="<?php echo htmlspecialchars($user['plz']); ?>">
        </div>
        <div class="mb-3">
            <label for="ort" class="form-label">Ort</label>
            <input type="text" class="form-control" id="ort" name="ort" value="<?php echo htmlspecialchars($user['ort']); ?>">
        </div>
        <div class="mb-3">
            <label for="passwort" class="form-label">Aktuelles Passwort (um das Passwort zu aktualisieren)</label>
            <input type="password" class="form-control" id="passwort" name="passwort">
        </div>
        <div class="mb-3">
            <label for="new_passwort" class="form-label">Neues Passwort</label>
            <input type="password" class="form-control" id="new_passwort" name="new_passwort">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="account.php" class="btn btn-secondary mt-3 mb-2">Zurück zu Konto</a>
</div>
<?php
include "footer.php";
?>