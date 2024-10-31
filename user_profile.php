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
        $education = $_POST['education'];
        $dob = $_POST['dob'];

        $updateStmt = $pdo->prepare("UPDATE studusers SET username = ?, email = ?, phone = ?, address = ?, degree = ?, education = ?, dob = ? WHERE id = ?");
        $updateStmt->execute([$username, $email, $phone, $address, $degree, $education, $dob, $userId]);

        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        echo "<script>alert('Profile updated successfully!');</script>";
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
    <link rel="stylesheet" href="userProf.css">
</head>
<body>
    <header>
    <h1>Student Profile</h1>
    </header>
    <div class="profile-container">
        <form method="POST" action="student_user.php">
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
                        <strong>Education Level:</strong>
                        <input type="text" name="education" id="education" value="<?= htmlspecialchars($user['education']) ?>" readonly>
                    </div>
                    <div class="detail-item">
                        <strong>Date of Birth:</strong>
                        <input type="date" name="dob" id="dob" value="<?= htmlspecialchars($user['dob']) ?>" readonly>
                    </div>
                </div>
                <!--<div class="resume-container">
                    <h2>Resume</h2>
                    <a href="<?php echo 'path_to_resumes/' . $user['resume']; ?>" target="_blank" class="resume-link">View Resume</a>
                </div> -->
            </div>
            <div class="logout">
                <a href="logout.php" class="logout-button">Logout</a>
            </div>
            <button type="button" id="editButton">Edit Profile</button>
            <button type="submit" id="saveButton" style="display:none;">Save Changes</button>
        </form>
    </div>

    <script>
 //this is for the editing part @hamdan
            document.getElementById('editButton').addEventListener('click', function () {
            document.querySelectorAll('input').forEach(input => input.removeAttribute('readonly'));
            document.getElementById('saveButton').style.display = 'inline-block';
            document.getElementById('editButton').style.display = 'none';
        });
    </script>
</body>
</html>
