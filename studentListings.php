<?php
session_start(); 

$host = 'localhost';
$db = 'student';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT jl.*, c.logo, c.company_name FROM job_listings jl JOIN companies c ON jl.company_id = c.id");
    $jobListings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link rel="stylesheet" href="studentListings.css">
</head>
<body>
    <header class="header">
        <h1>Job Listings</h1>
        <div class="search-container">
            <input type="text" placeholder="Search by position..." id="searchInput" onkeyup="filterListings()">
            <select id="filterSelect" onchange="filterListings()">
                <option value="">All Positions</option>
                <?php foreach ($jobListings as $job): ?>
                    <option value="<?php echo $job['position']; ?>"><?php echo $job['position']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </header>
    <div class="listings-container" id="listingsContainer">
        <?php if (count($jobListings) > 0): ?>
            <?php foreach ($jobListings as $job): ?>
                <div class="job-listing" data-position="<?php echo strtolower($job['position']); ?>">
                    <img src="<?php echo $job['logo']; ?>" alt="Company Logo" class="company-logo">
                    <div class="job-details">
                        <h2><?php echo $job['position']; ?></h2>
                        <h3><?php echo $job['company_name']; ?></h3>
                        <p><strong>Skills Required:</strong> <?php echo $job['skills']; ?></p>
                        <p><strong>Description:</strong> <?php echo $job['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No job listings available at the moment.</p>
        <?php endif; ?>
    </div>

    <script>
        function filterListings() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const filterSelect = document.getElementById('filterSelect').value.toLowerCase();
            const listingsContainer = document.getElementById('listingsContainer');
            const jobListings = listingsContainer.getElementsByClassName('job-listing');

            for (let i = 0; i < jobListings.length; i++) {
                const position = jobListings[i].getAttribute('data-position');
                const jobTitle = jobListings[i].querySelector('h2').textContent.toLowerCase();
                if ((jobTitle.includes(searchInput) || searchInput === "") && 
                    (position.includes(filterSelect) || filterSelect === "")) {
                    jobListings[i].style.display = "";
                } else {
                    jobListings[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
