<?php

/**
 * Check the database connection details are ok
 */

/**
 * Database connection data
 */
$host = $_ENV['DB_HOST'];
$user = "root";
$password = "secret";
$db_name = "bvk_mvc";

/**
 * Create a connection
 */
$conn = new mysqli($host, $user, $password, $db_name);

/**
 * Check the connection
 */
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "Connected successfully, connection data are ok.";
}
