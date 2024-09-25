<?php
session_start();
$title = "Artikel hinfügen";
include "header.php";

// Instantiate the Database object and establish a connection
$db = Database::getInstance();

// Initialize variables
$user_id = $_SESSION['user']['id'];
$error = '';
$success = '';

// Assuming user details are stored in the session
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

if (!$user) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $art_name = $_POST['art_name'];
    $art_desc = $_POST['art_desc'];
    $art_preis = $_POST['art_preis'];
    $u_kat_id = $_POST['u_kat_id'];

    // Handle file upload
    if (isset($_FILES['art_bild']) && $_FILES['art_bild']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['art_bild']['tmp_name'];
        $fileName = $_FILES['art_bild']['name'];
        $fileSize = $_FILES['art_bild']['size'];
        $fileType = $_FILES['art_bild']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Sanitize file name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Allowed file extensions
        $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'gif', "webp");
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Upload file to the /img directory
            $uploadFileDir = './img/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $art_bild = $dest_path; // Store relative path to database

                // Prepare the SQL statement
                $query = "INSERT INTO artikel (art_name, art_desc, art_preis, art_bild, u_kat_id)
                          VALUES (:art_name, :art_desc, :art_preis, :art_bild, :u_kat_id)";

                try {
                    // Prepare the statement
                    $stmt = $db->prepare($query);

                    // Bind parameters
                    $stmt->bindParam(':art_name', $art_name);
                    $stmt->bindParam(':art_desc', $art_desc);
                    $stmt->bindParam(':art_preis', $art_preis);
                    $stmt->bindParam(':art_bild', $art_bild);
                    $stmt->bindParam(':u_kat_id', $u_kat_id);

                    // Execute the statement
                    $stmt->execute();
                    echo "<div class='row gx-3 gy-4 text-center mt-5 mb-2 pt-5'>&nbsp;</div>";
                    echo "<p class='alert alert-success' role='alert'>New product added successfully!</p>";
                } catch (PDOException $e) {
                    echo "<p class='alert alert-danger' role='alert'>Error: " . $e->getMessage() . "</p>";
                }
            } else {
                echo "<p class='alert alert-danger' role='alert'>Error moving the uploaded file.</p>";
            }
        } else {
            echo "<p class='alert alert-danger' role='alert'>Invalid file extension. Allowed types: " . implode(', ', $allowedfileExtensions) . "</p>";
        }
    } else {
        echo "<p class='alert alert-danger' role='alert'>No file uploaded or there was an upload error.</p>";
    }
}
?>


<div class="container-md mt-5 pt-5">
<h2 class="mt-4">Artikel hinfügen</h2>
    <form action="add_product.php" method="post" enctype="multipart/form-data">
        <label for="art_name" class="form-label">Artikelname:</label>
        <input class="form-control" type="text" id="art_name" name="art_name" required><br><br>

        <label for="art_desc" class="form-label">Description:</label><br>
        <textarea class="form-control" id="art_desc" name="art_desc" rows="4" cols="50"></textarea><br><br>

        <label for="art_preis" class="form-label">Preis:</label>
        <input class="form-control" type="number" id="art_preis" name="art_preis" step="0.01" required><br><br>

        <label for="art_bild" class="form-label">Image:</label>
        <input class="form-control" type="file" id="art_bild" name="art_bild" required><br><br>

        <label for="u_kat_id" class="form-label">Unterkategorie ID:</label>
        <input class="form-control" type="number" id="u_kat_id" name="u_kat_id"><br><br>

        <input class="btn btn-primary" type="submit" value="Artikel hinfügen">
    </form>

</div>
<?php
include "footer.php";
?>