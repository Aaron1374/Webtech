<?php

$host = 'localhost';
$db = 'student';
$user = 'root'; 
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
    $sql = "INSERT INTO studusers (username, email, password, phone, address, degree, education, dob) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; /* add resume to attributes later and add ? to the values later*/
    
    $stmt = $pdo->prepare($sql);

    // Get the  form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $degree = $_POST['degree'];
    $education = $_POST['education'];
    $dob = $_POST['dob'];

    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

   
    $stmt->execute([$username, $email, $password, $phone, $address, $degree, $education, $dob]); /*add $resume later */

    echo "Sign up successful!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>