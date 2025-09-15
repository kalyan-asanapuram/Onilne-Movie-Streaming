<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form data is set before accessing
    if (isset($_POST['name'], $_POST['mobile'], $_POST['email'], $_POST['password'])) {
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

        // Insert user data into the database
        $sql = "INSERT INTO users (name, mobile, email, password) VALUES ('$name', '$mobile', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "New account created successfully. Go to <a href='login.html'>Login</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please fill in all fields.";
    }
} else {
    echo "Invalid request method.";
}
?>