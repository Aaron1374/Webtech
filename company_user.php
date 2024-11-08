<?php
session_start();

$host = 'localhost';
$db = 'student';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Please log in to access this page.'); window.location.href = 'companyLogin.html';</script>";
        exit();
    }

    $company_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("SELECT * FROM companies WHERE id = ?");
    $stmt->execute([$company_id]);
    $company = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$company) {
        echo "<script>alert('Company not found.'); window.location.href = 'companyLogin.html';</script>";
        exit();
    }
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


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Port+Lligat+Slab&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Port+Lligat+Slab&display=swap" rel="stylesheet">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">





    <link rel="stylesheet" href="company_user.css">
</head>
<body>
    <header>
        <h1>Company Profile</h1>
    </header>
         <div class="profile-container">
            <div class="profile-content">
                <div class="user-details">
                    <h2>Company Profile</h2>
                    <div class="detail-item">
                        <strong>Company Name:</strong>
                        <input type="text" name="company_name" value="<?= htmlspecialchars($company['company_name']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Field:</strong>
                        <input type="text" name="field" value="<?= htmlspecialchars($company['field']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Email:</strong>
                        <input type="email" name="email" value="<?= htmlspecialchars($company['email']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Phone:</strong>
                        <input type="tel" name="phone" value="<?= htmlspecialchars($company['phone']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Address:</strong>
                        <input type="text" name="address" value="<?= htmlspecialchars($company['address']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>State:</strong>
                        <input type="text" name="state" value="<?= htmlspecialchars($company['state']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>City:</strong>
                        <input type="text" name="city" value="<?= htmlspecialchars($company['city']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Website:</strong>
                        <input type="url" name="website" value="<?= htmlspecialchars($company['website']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Logo:</strong>
                        <!--<img src="<?php echo 'logos/' . htmlspecialchars($company['logo']); ?>" alt="Company Logo" class="logo">-->
                        <img src="logos/connectifyLogo.png" alt="Company Logo" class="logo">
                    </div>
                </div>
            </div>
        </div>




        <nav>
        <ul class="nav-list">
            <li class="nav-item">
                <label for="input-2">
                    <input type="radio" id="input-2" name="group" 
                    onclick="location.href='companyList.php';">
                    <span class="btn">
                        <i class="btn-icon fa-solid fa-building"></i>
                        <span class="btn-text">Listings</span>
                    </span>
                </label>
            </li>
            <li class="nav-item">
                <label for="input-3">
                    <input type="radio" id="input-3" name="group"
                    onclick="location.href='companyHomepage.html';">
                    <span class="btn">
                        <i class="btn-icon fa-solid fa-house"></i>
                        <span class="btn-text">Home</span>
                    </span>
                </label>
            </li>
            <li class="nav-item">
                <label for="input-4">
                    <input type="radio" id="input-4" name="group"
                    onclick="location.href='companyChat.html';">
                    <span class="btn">
                        <i class="btn-icon fa-solid fa-comments"></i>
                        <span class="btn-text">Chat</span>
                    </span>
                </label>
            </li>
            <li class="nav-item">
                <label for="input-5">
                    <input type="radio" id="input-5" name="group"
                    onclick="location.href='company_user.php';">
                    <span class="btn">
                        <i class="btn-icon fa-solid fa-user-circle"></i>
                        <span class="btn-text">Profile</span>
                    </span>
                </label>
            </li>
        </ul>
    </nav>



</body>
</html>
