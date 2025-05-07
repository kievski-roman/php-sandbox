<?php
require_once "db.php";

$openFile = fopen("data.csv", "r");
if($openFile === false){
    die("Unable to open file!");
}
fgetcsv($openFile);
while (($row = fgetcsv($openFile)) !== false) {
    [$name, $email, $age] = $row;

    $errors = [];
    if(empty(trim($name))){
        $errors[] = "Name is empty";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Invalid email";
    }
    if(!is_numeric($age)){
        $errors[] = "Age is invalid";
    }
    if(!empty($errors)){
        echo "line [{$name}, {$email}, {$age}]- " . implode('; ', $errors). "\n";
        continue;
    }
    $stmt = $pdo->prepare("INSERT INTO users (name, email, age) VALUES (?,?,?)");
    $stmt->execute([$name, $email, $age]);
    echo "Added line [{$name}, {$email}, {$age}]-\n";
}
fclose($openFile);