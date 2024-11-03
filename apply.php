<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: studentLogin.php"); 
    exit();
}

$job_id = $_GET['job_id'] ?? null; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost';
    $db = 'student';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $student_id = $_SESSION['user_id']; 

        $resume = $_FILES['resume'];
        $resume_path = 'resumes/' . basename($resume['name']); 

        if (move_uploaded_file($resume['tmp_name'], $resume_path)) {
            $sql = "INSERT INTO applications (job_id, name, email, phone, resume_path) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$job_id, $name, $email, $phone, $resume_path]);

            echo "<script>alert('Application submitted successfully!');</script>";
            echo "<script>window.location.href = 'studentListings.php';</script>"; 
            exit();
        } else {
            echo "Error uploading file.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Job</title>
    <link rel="stylesheet" href="apply.css">

</head>
<body>
    <h1>Apply for Job</h1>
    <form action="apply.php?job_id=<?php echo $job_id; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="tel" name="phone" placeholder="Your Phone Number" required>
        <input type="file" name="resume" required>
        <button type="submit">Apply</button>
    </form>
</body>
</html>
