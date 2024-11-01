<?php
$host = 'localhost';
$db = 'student'; 
$user = 'root'; 
$pass = ''; 

try {

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO companies (company_name, field, email, password, phone, address, state, city, website, logo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);


    $company_name = $_POST['company_name'];
    $field = $_POST['field'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $website = $_POST['website'];
    
    $logo = $_FILES['logo'];
    $logo_path = 'logos/' . basename($logo['name']); 

   
    if (move_uploaded_file($logo['tmp_name'], $logo_path)) {
        $stmt->execute([$company_name, $field, $email, $password, $phone, $address, $state, $city, $website, $logo_path]);

        echo "<script>window.location.href = 'companyLogin.html';</script>";  //do this after home done
        exit();
    } else {
        echo "<script>alert('Login failed! Please check your credentials.');</script>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
