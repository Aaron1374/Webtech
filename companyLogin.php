<?php
session_start();

$host = 'localhost';
$db = 'student';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM companies WHERE email = ?");
        $stmt->execute([$email]);
        $company = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($company && $password === $company['password']) {

            session_regenerate_id(true);
            $_SESSION['user_id'] = $company['id'];
            $_SESSION['company_name'] = $company['company_name'];
            $_SESSION['email'] = $company['email'];
            $_SESSION['phone'] = $company['phone'];
            $_SESSION['address'] = $company['address'];
            $_SESSION['field'] = $company['field'];
            $_SESSION['website'] = $company['website'];
            

            header("Location: homepage.html");
            exit();
        } else {
            echo "<script>alert('Login failed! Please check your credentials.');</script>";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
