<?php
ob_start();
session_start();
$title = "Anmeldung";
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
$email = '';
$passwort = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $passwort = trim($_POST['passwort']);

    if (!empty($email) && !empty($passwort)) {
        // Query to fetch user based on email
        $query = 'SELECT * FROM Kunde WHERE email = :email LIMIT 1';

        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debugging: Show fetched user details
        if ($user) {
            echo "Email: " . htmlspecialchars($user['email']) . "<br>";
            echo "Kunden ID: " . htmlspecialchars($user['id']) . "<br>";
            echo "Password (hashed): " . htmlspecialchars($user['passwort']) . "<br>";
        } else {
            echo "No user found with this email.<br>";
        }

        // Check if user exists and password matches
        if ($user && password_verify($passwort, $user['passwort'])) {
            // Password is correct, start a session and store user data
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'vorname' => $user['vorname'],
                'nachname' => $user['nachname'],
            ];
            header('Location: account.php'); // Redirect to account page after successful login
            exit;
        } else {
            $error = 'Invalid email or password';
        }
    } else {
        $error = 'Please fill in both fields';
    }
}
?>

<div class="container-md w-50">
    <h2 class="mt-4">Anmeldung</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    <form method="post" action="login.php">
        <div class="mb-3">
            <label for="email" class="form-label">Emailadresse</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <div class="mb-3">
            <label for="passwort" class="form-label">Passwort</label>
            <input type="password" class="form-control" id="passwort" name="passwort" required>
        </div>
        <button type="submit" class="btn btn-primary">Anmelden</button>
    </form>
    <p class="mt-3">Sie haben noch kein Konto? <a href="register.php">Registrieren Sie sich hier</a>.</p>
</div>
<?php
include "footer.php";
?>
