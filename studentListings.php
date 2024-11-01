<?php
session_start(); 

$host = 'localhost';
$db = 'student';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT jl.id, jl.vacancy_type, jl.skills_required, jl.job_description, c.company_name, c.logo 
            FROM job_listings jl 
            JOIN companies c ON jl.company_id = c.id";
   
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
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
                    <option value="<?php echo htmlspecialchars($job['vacancy_type']); ?>"><?php echo htmlspecialchars($job['vacancy_type']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </header>
    <div class="listings-container" id="listingsContainer">
        <?php if (count($jobListings) > 0): ?>
            <?php foreach ($jobListings as $job): ?>
                <div class="job-listing" data-position="<?php echo strtolower($job['vacancy_type']); ?>" data-company="<?php echo strtolower($job['company_name']); ?>">
                    <!--<img src="<?php echo 'logos/' . htmlspecialchars($job['logo']); ?>" alt="Company Logo" class="company-logo">-->
                    <img src="logos/connectifyLogo.png" alt="Company Logo" class="company-logo">
                    <div class="job-details">
                        <h2><?php echo htmlspecialchars($job['vacancy_type']); ?></h2>
                        <h3><?php echo htmlspecialchars($job['company_name']); ?></h3>
                        <p><strong>Skills Required:</strong> <?php echo htmlspecialchars($job['skills_required']); ?></p>
                        <p><strong>Description:</strong> <?php echo htmlspecialchars($job['job_description']); ?></p>
                        <a href="apply.php?job_id=<?php echo $job['id']; ?>" class="apply-button">Apply</a>                    
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No job listings available at the moment.</p>
        <?php endif; ?>
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



/function openApplicationForm(jobId) {
    document.getElementById('jobId').value = jobId; // Set job ID
    document.getElementById('applicationModal').style.display = 'block'; // Show modal
}

function closeApplicationForm() {
    document.getElementById('applicationModal').style.display = 'none'; // Hide modal
}


    </script>
</body>
</html>
