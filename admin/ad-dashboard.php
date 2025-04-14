<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - DormiTech</title>
    <link rel="stylesheet" href="../css/admin-styles.css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="ad-dashboard.php">
                <img src="../img/logo.png" alt="DORMITECH Logo">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="ad-dashboard.php" class="selected">Home</a></li>
                <li><a href="ad-tenants.php">Tenants</a></li>
                <li><a href="ad-rooms.php">Rooms</a></li>
                <li><a href="ad-payments.php">Payments</a></li>
                <li><a href="ad-complaints.php">Complaints</a></li>
                <li><a href="ad-chat.php">Chat</a></li>
                <li><a href="ad-profile.php">Admin</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="ad-welcome">
            <h1>Hello, Admin!</h1>
        </section>

        <section class="ad-stats">
            <div class="ad-stat-box">
                <h2>Total Tenants</h2>
                <p>5</p>
            </div>
            <div class="ad-stat-box">
                <h2>Pending Payments</h2>
                <ul>
                    <li>101 - Niñonuevo</li>
                    <li>102 - Mercado</li>
                </ul>
            </div>
            <div class="ad-stat-box">
                <h2>Open Complaints</h2>
                <ul>
                    <li>202 - Uy (Water)</li>
                </ul>
            </div>
            <div class="ad-stat-box">
                <h2>Available Beds</h2>
                <p>3</p>
            </div>
        </section>

        <section class="ad-recent-activity">
            <h2>Recent Activity</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activity</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>February 11, 2025</td>
                        <td>New Tenants</td>
                        <td>Pending</td>
                    </tr>
                    <tr>
                        <td>February 10, 2025</td>
                        <td>Room Inspections</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>February 9, 2025</td>
                        <td>Maintenance Request</td>
                        <td>Resolved</td>
                    </tr>
                    <tr>
                        <td>February 8, 2025</td>
                        <td>Fire Drill</td>
                        <td>Scheduled for February 15</td>
                    </tr>
                    <tr>
                        <td>February 7, 2025</td>
                        <td>Community Event</td>
                        <td>Game Night - February 20</td>
                    </tr>
                    <tr>
                        <td>February 6, 2025</td>
                        <td>Package Delivery</td>
                        <td>Delivered to Room 204</td>
                    </tr>
                    <tr>
                        <td>February 5, 2025</td>
                        <td>Roommate Change</td>
                        <td>New roommate assigned</td>
                    </tr>
                    <tr>
                        <td>February 4, 2025</td>
                        <td>Wi-Fi Upgrade</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>February 3, 2025</td>
                        <td>Lost & Found</td>
                        <td>New items added</td>
                    </tr>
                    <tr>
                        <td>February 2, 2025</td>
                        <td>Feedback Survey</td>
                        <td>Results analyzed</td>
                    </tr>
                </tbody>
            </table>
        </section>
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