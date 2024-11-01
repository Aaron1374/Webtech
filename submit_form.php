<?php

$host = 'localhost';
$db = 'student';
$user = 'root'; 
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO studusers (username, email, password, phone, address, degree, college, education, dob, resume) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 

    $stmt = $pdo->prepare($sql);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $degree = $_POST['degree'];
    $college = $_POST['college']; 
    $education = $_POST['education'];
    $dob = $_POST['dob'];


    $resume = $_FILES['resume']['name'];
    $target_dir = "resumes/"; 
    $target_file = $target_dir . basename($resume);
    
    if (move_uploaded_file($_FILES['resume']['tmp_name'], $target_file)) {
        $stmt->execute([$username, $email, $password, $phone, $address, $degree, $college, $education, $dob, $resume]); 

        echo "<script>window.location.href = 'studentLogin.html';</script>";  //do this after home done
        exit();
    } else {
        echo "<script>alert('Login failed! Please check your credentials.');</script>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
