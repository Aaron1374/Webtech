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

    $company_id = $_SESSION['user_id']; 
    $sql = "SELECT * FROM job_listings WHERE company_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$company_id]);
    $jobListings = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $applications = [];
    foreach ($jobListings as $job) {
        $sql = "SELECT * FROM applications WHERE job_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$job['id']]);
        $applications[$job['id']] = $stmt->fetchAll(PDO::FETCH_ASSOC);
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



    <link rel="stylesheet" href="companyList.css">
</head>
<body>
    <header>
        <h1>Your Job Listings</h1>
    </header>
    <div class="listings-container">
        <?php foreach ($jobListings as $job): ?>
            <div class="job-listing">
                <h2><?php echo $job['vacancy_type']; ?></h2>
                <p><strong>Skills Required:</strong> <?php echo $job['skills_required']; ?></p>
                <p><strong>Description:</strong> <?php echo $job['job_description']; ?></p>
                <h3>Applications:</h3>
                <?php if (!empty($applications[$job['id']])): ?>
                    <ul>
                        <?php foreach ($applications[$job['id']] as $application): ?>
                            <li>
                                <p><strong>Name:</strong> <?php echo $application['name']; ?></p>
                                <p><strong>Email:</strong> <?php echo $application['email']; ?></p>
                                <p><strong>Phone:</strong> <?php echo $application['phone']; ?></p>
                                <p><strong>Resume:</strong> <a href="<?php echo $application['resume_path']; ?>" target="_blank">View Resume</a></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No applications for this job listing.</p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
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
