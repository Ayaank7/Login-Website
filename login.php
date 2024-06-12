<!DOCTYPE html>
<html>
<head>
    <title>Login Result</title>
    <script>
        function displayErrorPopup() {
            document.getElementById("errorPopup").style.display = "block";
        }
    </script>
</head>
<body>
    <div id="errorPopup" style="display: none;">
        <p>Invalid username or password.</p>
    </div>

    <?php
        $un = $_POST["userName"];
        $pass = $_POST["Password"];
        try {
            // Establishing the database connection
            // Replace '***' with your actual database credentials
            $conn = new PDO("mysql:host=localhost;dbname=***", "***", "***");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM login WHERE Username=? AND Password=?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$un, $pass]);
            $row = $stmt->fetch();

            if ($row) {
                // Valid user
                // Redirect the user to their Instagram profile
                header("Location: https://www.instagram.com/$un/");
                exit();
            } else {
                // Invalid user
                // Display an error popup
                echo '<script>displayErrorPopup();</script>';
            }
            $conn = null;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    ?>
</body>
</html>
