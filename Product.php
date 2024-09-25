<?php
class Product {
    private $conn; // db connection
    private $table = 'artikel'; // name of the table that stores the products.
    private $categoryTable = 'u_kat'; // name of the table that stores the categories.

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    // Get products by category ID
    public function getProductsByCategory(int $categoryId): array {
        try {
            $query = 'SELECT * FROM ' . $this->table . ' WHERE u_kat_id = :categoryId';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Consider logging the error message
            throw new Exception('Fehler beim Abrufen von Produkten: ' . $e->getMessage());
        }
    }

    // Get category name by category ID
    public function getCategoryName(int $categoryId): string {
        try {
            $query = 'SELECT u_kat_name FROM ' . $this->categoryTable . ' WHERE u_kat_id = :categoryId';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result['u_kat_name'] : 'Unbekannte Kategorie'; // Return a default name if not found
        } catch (PDOException $e) {
            // Consider logging the error message
            throw new Exception('Fehler beim Abrufen des Kategorienamens: ' . $e->getMessage());
        }
    }

    public function searchProducts($searchQuery): array {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE art_name LIKE :searchQuery OR art_desc LIKE :searchQuery";
            $stmt = $this->conn->prepare($query);
            $searchTerm = "%" . $searchQuery . "%";
            $stmt->bindParam(':searchQuery', $searchTerm, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Consider logging the error message
            throw new Exception('Fehler bei der Suche nach Produkten: ' . $e->getMessage());
        }
    }
    public function getRandomProducts($limit) {
        try {
            $query = "SELECT * FROM " . $this->table . " ORDER BY RAND() LIMIT :limit";
            $stmt = $this->conn->prepare($query);  // Corrected from $this->db to $this->conn
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Fehler beim Abrufen von Zufallsprodukten: ' . $e->getMessage());
        }
    }

    public function getProductById($id) {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE art_id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception('Fehler beim Abrufen des Produkts: ' . $e->getMessage());
        }
    }

// Function to render cart items
    public function renderCartItems(array $cartItems, int $kunden_id) {
        if (!empty($cartItems)) {
            echo '<table class="table table-striped text-center mt-5 pt-5">';
            echo '<thead>';
            echo '<tr>';
            echo '<th scope="col">Produktbild</th>';
            echo '<th scope="col">Produkt</th>';
            echo '<th scope="col">Preis</th>';
            echo '<th scope="col">Menge</th>';
            echo '<th scope="col">Gesamt</th>';
            echo '<th scope="col">Aktionen</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $totalPrice = 0;
            foreach ($cartItems as $product_id => $details) {
                $query = "SELECT * FROM " . $this->table . " WHERE art_id = :product_id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
                $stmt->execute();

                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $price = $row['art_preis'];
                    $total = $price * $details['quantity'];
                    $totalPrice += $total;

                    echo '<tr class="align-middle">';
                    echo '<td><img src="' . htmlspecialchars($row['art_bild']) . '" class="img-fluid" style="max-width: 100px;"/></td>';
                    echo '<td>' . htmlspecialchars($row['art_name']) . '</td>';
                    echo '<td>€ ' . number_format($price, 2, ',', '.') . '</td>';
                    echo '<td>';
                    echo '<form action="cart.php" method="post">';
                    echo '<input type="number" name="quantity" min="1" value="' . htmlspecialchars($details['quantity']) . '" class="form-control" style="width: 80px; display: inline-block;">';
                    echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($product_id) . '">';
                    echo '<input type="hidden" name="update_quantity" value="1">';
                    echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token']) . '">';
                    echo '<button type="submit" class="btn btn-primary btn-sm">Update</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '<td>€ ' . number_format($total, 2, ',', '.') . '</td>';
                    echo '<td>';
                    echo '<form action="cart.php" method="post">';
                    echo '<input type="hidden" name="remove" value="' . htmlspecialchars($product_id) . '">';
                    echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token']) . '">';
                    echo '<button type="submit" class="btn btn-danger btn-sm">entfernen</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            }

            echo '</tbody>';
            echo '</table>';
            echo '<div class="mt-4 d-flex justify-content-end me-5"><h4>Total: € ' . number_format($totalPrice, 2, ',', '.') . '</h4></div>';

            // Order button form redirects to pay.php
            echo '<div class="text-center mb-3"><form action="pay.php" method="post">';
            echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token']) . '">';
            echo '<button type="submit" class="btn btn-success mt-4 align-middle">Bestellen</button>';
            echo '</form></div>';
        } else {
            echo '<div>&nbsp;</div><div>&nbsp;</div><h3 class="text-center">Ihr Warenkorb ist leer.</h3>';
        }
    }

    // Function to render products
    function renderProducts($products) {
        echo '<div class="row gy-4 text-center mt-2">';
        foreach ($products as $row) {
            $productStock = $this->getProductStock($row['art_id']); // Get the product stock

            echo '<div class="col-lg-3 col-md-6 col-sm-12 d-flex flex-column">';
            echo '<div class="card mb-1 h-100 d-flex flex-column">';
            echo '<a href="product_detail.php?id=' . htmlspecialchars($row['art_id']) . '" style="text-decoration:none; color: #000000">';
            echo '<img src="' . htmlspecialchars($row['art_bild']) . '" class="card-img-top" alt="' . htmlspecialchars($row['art_name']) . '">';
            echo '<div class="card-body d-flex flex-column">';
            echo '<h5 class="card-title">' . htmlspecialchars($row['art_name']) . '</h5>';
            $description = substr($row['art_desc'], 0, 70);
            $description = substr($description, 0, strrpos($description, ' ')); // Cut off at the last space
            echo '<p class="card-text">' . $description . '...</p>';
            echo '</a>';
            echo '<div class="mt-auto">';
            echo '<h5 class="price text-danger">€ ' . number_format($row['art_preis'], 2, ',', '.') . '</h5>';

            // Conditionally render the "In den Warenkorb" button or "Not available" message
            if ($productStock > 0) {
                echo '<form action="add_to_cart.php" method="post" class="add-to-cart-form">';
                echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($row['art_id']) . '">';
                echo '<button type="submit" class="btn btn-primary mt-2">In den Warenkorb</button>';
                echo '</form>';
            } else {
                echo '<p class="text-danger mt-2">nicht verfügbar</p>';
            }

            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }

// Get product stock from lager table
    public function getProductStock($productId) {
        try {
            $query = "SELECT menge FROM lager WHERE art_id = :product_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? (int)$result['menge'] : 0; // Default to 0 if not found
        } catch (PDOException $e) {
            throw new Exception('Fehler beim Abrufen des Lagerbestands: ' . $e->getMessage());
        }
    }

}