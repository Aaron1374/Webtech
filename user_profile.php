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
        echo "<script>alert('Please log in to access your profile.'); window.location.href = 'login.php';</script>";
        exit();
    }

    $userId = $_SESSION['user_id'];
    $stmt = $pdo->prepare("SELECT * FROM studusers WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Profile update
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Collecting user input
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $degree = $_POST['degree'];
        $college = $_POST['college'];
        $education = $_POST['education'];
        $dob = $_POST['dob'];
        $resume = $_POST['resume'];

        $updateStmt = $pdo->prepare("UPDATE studusers SET username = ?, email = ?, phone = ?, address = ?, degree = ?, college = ?, education = ?, dob = ?, resume = ? WHERE id = ?");
        $updateStmt->execute([$username, $email, $phone, $address, $degree, $college, $education, $dob, $resume, $userId]);

        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

       // echo "<script>alert('Profile updated successfully!');</script>";
    }
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>


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




    <link rel="stylesheet" href="userProf.css">
</head>
<body>
    <header>
    <h1>Student Profile</h1>
    </header>
    <div class="profile-container">
        <form method="POST" action="user_profile.php">
            <div class="profile-content">
                <div class="user-details">
                    <h2>Profile Details</h2>
                    <div class="detail-item">
                        <strong>Username:</strong>
                        <input type="text" name="username" id="username" value="<?= htmlspecialchars($user['username']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Email:</strong>
                        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Phone Number:</strong>
                        <input type="tel" name="phone" id="phone" value="<?= htmlspecialchars($user['phone']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Address:</strong>
                        <input type="text" name="address" id="address" value="<?= htmlspecialchars($user['address']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Degree:</strong>
                        <input type="text" name="degree" id="degree" value="<?= htmlspecialchars($user['degree']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>College:</strong>
                        <input type="text" name="college" id="college" value="<?= htmlspecialchars($user['college']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Education Level:</strong>
                        <input type="text" name="education" id="education" value="<?= htmlspecialchars($user['education']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Date of Birth:</strong>
                        <input type="date" name="dob" id="dob" value="<?= htmlspecialchars($user['dob']) ?>" readonly>
                    </div>
                </div>
                <div class="detail-item">
                        <strong>Resume:</strong>
                        <?php if (!empty($user['resume'])): ?>
                            <a href="<?php echo 'path_to_resumes/' . htmlspecialchars($user['resume']); ?>" target="_blank" class="resume-link">View Resume</a>
                        <?php else: ?>
                            <span>No resume uploaded.</span>
                        <?php endif; ?>
                    </div>
            </div>
            <div class="logout">
                <a href="logout.php" class="logout-button">Logout</a>
            </div>
            <button type="button" id="editButton">Edit Profile</button>
            <button type="submit" id="saveButton" style="display:none;">Save Changes</button>
        </form>
    </div>

    <nav>
        <ul class="nav-list">
            <li class="nav-item">
                <label for="input-1">
                    <input type="radio" id="input-1" name="group"
                    onclick="location.href='skills.html';">
                    <span class="btn">
                        <i class="btn-icon fa-solid fa-line-chart"></i>
                        <span class="btn-text">Skills</span>
                    </span>
                </label>
            </li>
            <li class="nav-item">
                <label for="input-2">
                    <input type="radio" id="input-2" name="group" 
                    onclick="location.href='studentListings.php';">
                    <span class="btn">
                        <i class="btn-icon fa-solid fa-building"></i>
                        <span class="btn-text">Listings</span>
                    </span>
                </label>
            </li>
            <li class="nav-item">
                <label for="input-3">
                    <input type="radio" id="input-3" name="group"
                    onclick="location.href='homepage.html';">
                    <span class="btn">
                        <i class="btn-icon fa-solid fa-house"></i>
                        <span class="btn-text">Home</span>
                    </span>
                </label>
            </li>
            <li class="nav-item">
                <label for="input-4">
                    <input type="radio" id="input-4" name="group"
                    onclick="location.href='chat.html';">
                    <span class="btn">
                        <i class="btn-icon fa-solid fa-comments"></i>
                        <span class="btn-text">Chat</span>
                    </span>
                </label>
            </li>
            <li class="nav-item">
                <label for="input-5">
                    <input type="radio" id="input-5" name="group"
                    onclick="location.href='user_profile.php';">
                    <span class="btn">
                        <i class="btn-icon fa-solid fa-user-circle"></i>
                        <span class="btn-text">Profile</span>
                    </span>
                </label>
            </li>
        </ul>
    </nav>

    <script>
 //this is for the editing part @hamdan
            document.getElementById('editButton').addEventListener('click', function () {
            document.querySelectorAll('input').forEach(input => input.removeAttribute('readonly'));
            document.getElementById('saveButton').style.display = 'inline-block';
            document.getElementById('editButton').style.display = 'none';
        });


        function highlightActivePage() {
    const path = window.location.pathname;

    if (path.includes('home')) {
        document.getElementById('input-3').checked = true;
    } else if (path.includes('listings')) {
        document.getElementById('input-2').checked = true;
    } else if (path.includes('skills')) {
        document.getElementById('input-1').checked = true;
    } else if (path.includes('chat')) {
        document.getElementById('input-4').checked = true;
    } else if (path.includes('profile')) {
        document.getElementById('input-5').checked = true;
    }
}

window.onload = highlightActivePage;
    </script>
</body>
</html>
