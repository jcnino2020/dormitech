<?php
session_start();

// Include the database connection file
require_once '../auth.php';

// Redirect if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id']; // Get the logged-in user's ID

// Fetch user profile data from the database
$sql = "SELECT * FROM Users WHERE User_ID = ?"; // Updated column name to User_ID
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
} else {
    die("Database error: " . $conn->error);
}

$conn->close();

// Check if user data exists
if (!$user) {
    die("User not found.");
}

// Handle search functionality
$search_term = '';
$activities = [
    ['date' => 'January 30, 2025', 'activity' => 'Payment Made', 'details' => '₱2,500.00 via GCash'],
    ['date' => 'January 25, 2025', 'activity' => 'Complaint Filed', 'details' => 'AC not working in room ' . htmlspecialchars($user['Room_Number'])], // Updated column name to Room_Number
    ['date' => 'January 20, 2025', 'activity' => 'Room Checked', 'details' => 'Room ' . htmlspecialchars($user['Room_Number']) . ' inspected and cleaned'] // Updated column name to Room_Number
];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $search_term = trim($_GET['search']);
    $activities = array_filter($activities, function ($activity) use ($search_term) {
        return stripos($activity['activity'], $search_term) !== false || stripos($activity['details'], $search_term) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - DormiTech</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
</head>
<body>
    <header>
        <div class="logo">
            <a href="../dashboard.php">
                <img src="../img/logo.png" alt="DORMITECH Logo">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="../dashboard.php">Home</a></li>
                <li><a href="payments.php">Payments</a></li>
                <li><a href="complaints.php">Complaints</a></li>
                <li><a href="chat.php">Chat</a></li>
                <li><a href="notif.php">Notifications</a></li>
                <li><a href="profile.php" class="selected">Profile</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Your Profile</h1>
        <section class="profile">
            <h2><?= htmlspecialchars($user['First_Name'] . ' ' . $user['Last_Name']) ?></h2>
            <div class="profile-container">
                <div class="profile-image">
                    <img src="<?= htmlspecialchars($user['Profile_Picture']) ?>" alt="Profile Picture">
                </div>
                <div class="profile-details">
                    <div class="detail">
                        <label for="username">Username:</label>
                        <span id="username"><?= htmlspecialchars($user['Username']) ?></span>
                    </div>
                    <div class="detail">
                        <label for="first-name">First Name:</label>
                        <span id="first-name"><?= htmlspecialchars($user['First_Name']) ?></span>
                    </div>
                    <div class="detail">
                        <label for="last-name">Last Name:</label>
                        <span id="last-name"><?= htmlspecialchars($user['Last_Name']) ?></span>
                    </div>
                    <div class="detail">
                        <label for="email">Email:</label>
                        <span id="email"><?= htmlspecialchars($user['Email']) ?></span>
                    </div>
                    <div class="detail">
                        <label for="mobile-number">Mobile Number:</label>
                        <span id="mobile-number"><?= htmlspecialchars($user['Mobile_Number']) ?></span>
                    </div>
                </div>
            </div>
            <button class="edit-profile">Edit your Profile</button>
            <a href="../logout.php"><button class="edit-profile">Logout</button></a>
            <button class="edit-profile">Account Settings</button>
        </section>
        <div class="additional-info">
            <div class="info-box">
                <h3>Rent Due</h3>
                <p>₱<?= number_format($user['Rent_Due'], 2) ?></p>
            </div>
            <div class="info-box">
                <h3>Pending Complaints</h3>
                <p><?= htmlspecialchars($user['Pending_Complaints']) ?></p>
            </div>
            <div class="info-box">
                <h3>Room Number</h3>
                <p><?= htmlspecialchars($user['Room_Number']) ?></p>
            </div>
        </div>

        <div class="recent-activity">
            <h2>Recent Activity</h2>
            <!-- Search Form -->
            <form method="GET" class="search-form">
                <input type="text" name="search" placeholder="Search activities..." value="<?= htmlspecialchars($search_term) ?>">
                <button type="submit">Search</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activity</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($activities)): ?>
                        <?php foreach ($activities as $activity): ?>
                            <tr>
                                <td><?= htmlspecialchars($activity['date']) ?></td>
                                <td><?= htmlspecialchars($activity['activity']) ?></td>
                                <td><?= htmlspecialchars($activity['details']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No activities found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2025 DormiTech. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>