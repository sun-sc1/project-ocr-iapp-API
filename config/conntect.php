<?php
$HOST = "localhost";
$USERNAME = "root";
$PASSWORD = "root";
$DB_NAME = "php_project_students_card"; // Replace this with your database name

// api key
$API_KEY = "t9flnOfSFUM9TuOlVVcfRBEG9Af9AvzT";

try {
    // Step 1: Instantiate PDO Object
    $conn = new mysqli($HOST,$USERNAME,$PASSWORD,$DB_NAME);

} catch (PDOException $e) {
    // Step 3: Handle Connection Errors
    echo "Connection failed: " . $e->getMessage();
}
