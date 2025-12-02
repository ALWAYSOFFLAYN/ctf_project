<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new PDO('sqlite:/var/www/html/users.db');
        
    $stmt = $db->prepare("SELECT * FROM users WHERE username='$username' AND password='$password'");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    if (!empty($result)) {                         // Check if ANY row was returned
        foreach ($result as $row) {                // Process EACH returned row
            echo "<p>User: {$row['username']} logged in!</p>";
            
            //if it's admin that logged in, shows admin flag automatically
            if ($row['username'] === 'admin') {
                echo "<pre>" . file_get_contents('admin/admin.flag.txt') . "</pre>";}}
    } else {
        echo "<p>Invalid Credentials.</p>";
    }
}
?>