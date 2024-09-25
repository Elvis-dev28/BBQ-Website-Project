<?php
session_start();
$title = "Admin - Nachrichten";
include "header.php";

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Instantiate the Database object and establish a connection
$db = Database::getInstance();


// Instantiate the Database object and establish a connection
//$database = new Database();
//$db = $database->connect();

// SQL query to fetch messages
$query = "SELECT id, name, email, category, message, created_at FROM kontakt_form";

try {
    // Prepare and execute the SQL statement
    $stmt = $db->prepare($query);
    $stmt->execute();

    // Fetch all messages
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error retrieving messages: " . $e->getMessage());
}
?>

<div class="container-md">
    <h2>Nachrichten Verwaltung</h2>

    <?php if (!empty($messages)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Kategorie</th>
                    <th>Nachricht</th>
                    <th>Datum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($messages as $message): ?>
                    <tr>
                        <td><?= htmlspecialchars($message['id']) ?></td>
                        <td><?= htmlspecialchars($message['name']) ?></td>
                        <td><?= htmlspecialchars($message['email']) ?></td>
                        <td><?= htmlspecialchars($message['category']) ?></td>
                        <td><?= htmlspecialchars($message['message']) ?></td>
                        <td><?= htmlspecialchars($message['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="alert alert-info" role="alert">Keine Nachrichten gefunden.</p>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
