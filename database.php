
<?php 
    $host = 'localhost'; // e.g., 'localhost'
    $dbname = 'pra';
    $username = 'root';
    $pass = '';
    
    // Create a MySQLi connection
    $con = new mysqli($host, $username, $pass, $dbname);
    
    // Check if the connection was successful
    if ($con->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
?>