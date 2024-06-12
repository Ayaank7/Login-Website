<?php
$un = $_POST["userName"];
$pass = $_POST["Password"];
try {
    // Establishing the database connection
    // Replace '***' with your actual database credentials
    $conn = new PDO("mysql:host=localhost;dbname=***", "***", "***");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "INSERT INTO login (Username, Password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$un, $pass]);
    $rowsAffected = $stmt->rowCount();

    if ($rowsAffected > 0) {
        // Insertion successful
        echo "Sign Up Successful";
    } else {
        // Insertion failed
        echo "Username Exists";
    }
    $conn = null;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
