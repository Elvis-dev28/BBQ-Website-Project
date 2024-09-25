<?php
session_start();
$title = "Edit Product";
include 'header.php';

// Instantiate the Database object and establish a connection
$db = Database::getInstance();

// Initialize variables
$error = '';
$success = '';

// Check if product ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php'); // Redirect to products list if no ID is provided
    exit;
}

$product_id = $_GET['id'];

// Fetch product details from database
$query = "SELECT * FROM artikel WHERE art_id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $product_id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    header('Location: index.php'); // Redirect if product not found
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $art_name = $_POST['art_name'];
    $art_desc = $_POST['art_desc'];
    $art_preis = $_POST['art_preis'];
    $u_kat_id = $_POST['u_kat_id'];

    // Default to existing image
    $art_bild = $product['art_bild'];
    $update_image = false;

    // Handle file upload if a new image is uploaded
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
        $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'gif', 'webp');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Upload file to the /img directory
            $uploadFileDir = './img/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $art_bild = $dest_path; // Store relative path to database
                $update_image = true;   // Mark that the image should be updated
            } else {
                $error = "Error moving the uploaded file.";
            }
        } else {
            $error = "Invalid file extension. Allowed types: " . implode(', ', $allowedfileExtensions);
        }
    }

    if (!$error) {
        // Prepare the base SQL query
        $query = "UPDATE artikel SET art_name = :art_name, art_desc = :art_desc, art_preis = :art_preis, u_kat_id = :u_kat_id";

        // Append image update only if a new image was uploaded
        if ($update_image) {
            $query .= ", art_bild = :art_bild";
        }

        $query .= " WHERE artikel.art_id = :id";

        try {
            // Prepare the statement
            $stmt = $db->prepare($query);

            // Bind parameters
            $stmt->bindParam(':art_name', $art_name);
            $stmt->bindParam(':art_desc', $art_desc);
            $stmt->bindParam(':art_preis', $art_preis);
            $stmt->bindParam(':u_kat_id', $u_kat_id);

            // Bind the image path only if a new image was uploaded
            if ($update_image) {
                $stmt->bindParam(':art_bild', $art_bild);
            }

            $stmt->bindParam(':id', $product_id);

            // Execute the statement
            $stmt->execute();

            $success = "Product updated successfully!";
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>

<div class="container-md">
    <h2 class="">Edit Product</h2>
    <?php if ($error): ?>
        <p class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <?php if ($success): ?>
        <p class="alert alert-success" role="alert"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <form action="edit_product.php?id=<?= htmlspecialchars($product_id) ?>" method="post" enctype="multipart/form-data">
        <label for="art_name" class="form-label">Product Name:</label>
        <input class="form-control" type="text" id="art_name" name="art_name" value="<?= htmlspecialchars($product['art_name']) ?>" required><br><br>

        <label for="art_desc" class="form-label">Description:</label><br>
        <textarea class="form-control" id="art_desc" name="art_desc" rows="4" cols="50"><?= htmlspecialchars($product['art_desc']) ?></textarea><br><br>

        <label for="art_preis" class="form-label">Price:</label>
        <input class="form-control" type="number" id="art_preis" name="art_preis" step="0.01" value="<?= htmlspecialchars($product['art_preis']) ?>" required><br><br>

        <label for="art_bild" class="form-label">Image:</label>
        <input class="form-control" type="file" id="art_bild" name="art_bild"><br><br>

        <label for="u_kat_id" class="form-label">Subcategory ID:</label>
        <input class="form-control" type="number" id="u_kat_id" name="u_kat_id" value="<?= htmlspecialchars($product['u_kat_id']) ?>"><br><br>

        <input class="btn btn-primary mb-2" type="submit" value="Update Product">
    </form>

</div>
<?php
include "footer.php";
?>