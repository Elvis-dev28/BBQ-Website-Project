<?php
session_start();
$title = "Kontakt";
include "header.php";

// Instantiate the Database object and establish a connection
//$database = new Database();
//$db = $database->connect();

$error = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $message = $_POST['message'];

    // Validate form data
    if (empty($name) || empty($email) || empty($category) || empty($message)) {
        $error = 'Alle Felder sind erforderlich.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Ungültige E-Mail Adresse.';
    } else {

        // $success= "Erfolgreich, aber PHPMailer ist erforderlich!";
        // Prepare the SQL statement
        $query = "INSERT INTO kontakt_form (name, email, category, message) VALUES (:name, :email, :category, :message)";

        try {
            // Prepare the statement
            $stmt = $db->prepare($query);

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':category', $category);
            $stmt->bindParam(':message', $message);

            // Execute the statement
            $stmt->execute();

            $success = "Vielen Dank für Ihr Feedback!";
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>

    <div class="container-md w-50">
        <h2 class="">Kontakt</h2>

        <?php if ($error): ?>
            <p class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="alert alert-success" role="alert"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form action="contact.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Thema:</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="" disabled selected>Wählen Sie eine Kategorie</option>
                    <option value="1">Technisches Problem</option>
                    <option value="2">Fragen zur Rechnungsstellung</option>
                    <option value="3">Allgemeine Anfrage</option>
                    <option value="4">Rückmeldung</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Nachricht (max. 500 Zeichen):</label>
                <textarea class="form-control" id="message" name="message" rows="4" maxlength="500" oninput="updateCharacterCount()" required></textarea>
                <small id="charCount" class="form-text text-muted">500 Zeichen übrig</small>
            </div>

            <script>
                function updateCharacterCount() {
                    var message = document.getElementById('message');
                    var charCount = document.getElementById('charCount');
                    var remaining = 500 - message.value.length;
                    charCount.textContent = remaining + ' Zeichen übrig';
                }
            </script>

            <div class="mb-3">
            <button type="submit" class="btn btn-primary">senden</button>
            </div>
        </form>
    </div>



<?php include 'footer.php'; ?>