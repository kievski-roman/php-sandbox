<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=DBNAME;charset=utf8", "USER", "PASSWORD");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage());
}
