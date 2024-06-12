# Login and Signup Website

This is a simple login and signup website project. The frontend is designed using HTML and CSS, and PHP is used for the backend logic.

## Features

- User Signup
- User Login
- Form validation

## Technologies Used

- **Frontend:** HTML, CSS
- **Backend:** PHP
- **Database:** MySQL 

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine.

### Prerequisites

- A web server with PHP support (e.g., [XAMPP](https://www.apachefriends.org/index.html), [WAMP](http://www.wampserver.com/en/), [MAMP](https://www.mamp.info/en/))
- A web browser
- (Optional) MySQL Database if you are using database integration

### Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/Ayaank7/Login-Website.git
    ```

2. **Navigate to the project directory:**

    ```bash
    cd Login-Website
    ```

3. **Set up your web server:**

    Place the project files in the root directory of your web server (e.g., `htdocs` for XAMPP).

4. **Set up the database:**
    Create a database named `ayaan` and a table named `login` with the provided SQL commands.

    1. **Create the database:**

        ```sql
        CREATE DATABASE ayaan;
        USE ayaan;
        ```

    2. **Create the `login` table:**

        ```sql
        CREATE TABLE login (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL
        );
        ```

5. **Configure database connection:**

    Update the database configuration in your PHP files with your actual database credentials. For example, in your `login.php` and `signup.php` files:

    ```php
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
    ```

    Replace the placeholders with your actual database credentials:

    - `dbname` - Your database name
    - The first `***` - Your database username
    - The second `***` - Your database password

    For example:

    ```php
    $conn = new PDO("mysql:host=localhost;dbname=ayaan", "your_database_username", "your_database_password");
    ```

6. **Run the project:**

    Open your web browser and navigate to `http://localhost/Login-Website`.

## Usage

- **Signup:** Create a new account by filling in the signup form.
- **Login:** Login with your credentials using the login form.

## Project Structure

Briefly explain the structure of your project files and folders.

```plaintext
Login-Website/
├── styles.css
├── imas.jpeg
├── index.html
├── login.php
├── signup.php
└── README.md
```
![Screenshot 2024-06-12 131855](https://github.com/Ayaank7/Login-Website/assets/142133833/88c74f0b-4bb8-4361-ae4e-e55d643ee54e)
