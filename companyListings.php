<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: companyLog.html");
    exit();
}

$host = 'localhost';
$db = 'student';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $company_id = $_SESSION['user_id']; 
        $position = $_POST['position'];
        $required_skills = $_POST['required_skills'];
        $job_description = $_POST['job_description'];

        $sql = "INSERT INTO job_listings (company_id, position, required_skills, job_description) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$company_id, $position, $required_skills, $job_description]);

        echo "<script>alert('Job listing created successfully!');</script>";
        echo "<script>window.location.href = 'companyListings.php';</script>";
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
    <title>Company Listings</title>
    <link rel="stylesheet" href="companyListings.css">
</head>
<body>
    <header>
        <h1>Create Job Listing</h1>
    </header>
    <form action="companyListings.php" method="POST">
        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required>
        
        <label for="required_skills">Required Skills:</label>
        <textarea id="required_skills" name="required_skills" required></textarea>
        
        <label for="job_description">Job Description:</label>
        <textarea id="job_description" name="job_description" required></textarea>
        
        <button type="submit">Create Listing</button>
    </form>
</body>
</html>
