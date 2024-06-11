<?php
$host = 'localhost';  // Ganti dengan host database
$dbname = 'project_umkm';  // Nama database
$username = 'root';  // Username database
$password = '';  // Password database

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
