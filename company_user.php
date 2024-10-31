<?php
session_start();

$host = 'localhost';
$db = 'student';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch company user details from session
    $company_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("SELECT * FROM companies WHERE id = ?");
    $stmt->execute([$company_id]);
    $company = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
    <link rel="stylesheet" href="company_user.css">
</head>
<body>
    <div class="profile-container">
        <div class="profile-content">
            <div class="profile-details">
                <h1>Company Profile</h1>
                <p><strong>Company Name:</strong> <?php echo htmlspecialchars($company['company_name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($company['email']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($company['phone']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($company['address']); ?></p>
                <p><strong>Field:</strong> <?php echo htmlspecialchars($company['field']); ?></p>
                <p><strong>Website:</strong> <a href="<?php echo htmlspecialchars($company['website']); ?>" target="_blank"><?php echo htmlspecialchars($company['website']); ?></a></p>
            </div>
            <div class="logo-container">
                <img src="<?php echo 'path_to_logos/' . $company['logo']; ?>" alt="Company Logo" class="logo">
            </div>
        </div>
        <div class="logout">
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </div>
</body>
</html>
