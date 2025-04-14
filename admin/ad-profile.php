<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints - DormiTech Admin</title>
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
                <li><a href="ad-dashboard.php">Home</a></li>
                <li><a href="ad-tenants.php">Tenants</a></li>
                <li><a href="ad-rooms.php">Rooms</a></li>
                <li><a href="ad-payments.php">Payments</a></li>
                <li><a href="ad-complaints.php">Complaints</a></li>
                <li><a href="ad-chat.php">Chat</a></li>
                <li><a href="ad-profile.php" class="selected">Admin</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Admin Profile</h1>
        <section class="profile">
            <h2></h2>
            <div class="profile-container">
                <div class="profile-image">
                    <img src="../img/ho1.png" alt="Profile Picture">
                </div>
                <div class="profile-details">
                    <div class="detail">
                        <label for="username">Username:</label>
                        <span id="username">juan.dz</span>
                    </div>
                    <div class="detail">
                        <label for="first-name">First Name:</label>
                        <span id="first-name">Juan</span>
                    </div>
                    <div class="detail">
                        <label for="last-name">Last Name:</label>
                        <span id="last-name">De la Cruz</span>
                    </div>
                    <div class="detail">
                        <label for="email">Email:</label>
                        <span id="email">juan.dz@gmail.com</span>
                    </div>
                    <div class="detail">
                        <label for="mobile-number">Mobile Number:</label>
                        <span id="mobile-number">09123456789</span>
                    </div>
                    <div class="detail">
                        <label for="role">Role:</label>
                        <span id="role">Administrator</span>
                    </div>
                </div>
            </div>
            <button class="edit-profile">Edit your Profile</button>
            <a href="../welcome.php"><button class="edit-profile">Logout</button></a>
            <button class="edit-profile">Account Settings</button>
        </section>
    
        <div class="additional-info">
            <div class="info-box">
                <h3>Total Tenants</h3>
                <p>50</p>
            </div>
            <div class="info-box">
                <h3>Available Rooms</h3>
                <p>10</p>
            </div>
            <div class="info-box">
                <h3>Pending Complaints</h3>
                <p>3</p>
            </div>
            <div class="info-box">
                <h3>Recent Payments</h3>
                <p>₱12,500.00</p>
            </div>
        </div>
    
        <div class="recent-activity">
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
                        <td>February 19, 2025</td>
                        <td>Tenant Added</td>
                        <td>Samuel Gonzales (Room 221)</td>
                    </tr>
                    <tr>
                        <td>February 18, 2025</td>
                        <td>Payment Processed</td>
                        <td>₱2,500.00 via Cash</td>
                    </tr>
                    <tr>
                        <td>February 17, 2025</td>
                        <td>Tenant Moved Out</td>
                        <td>Nicole Alonzo (Room 220)</td>
                    </tr>
                    <tr>
                        <td>February 16, 2025</td>
                        <td>Complaint Received</td>
                        <td>Water leak reported in Room 212</td>
                    </tr>
                    <tr>
                        <td>February 15, 2025</td>
                        <td>Payment Processed</td>
                        <td>₱3,000.00 via GCash</td>
                    </tr>
                    <tr>
                        <td>February 14, 2025</td>
                        <td>Maintenance Completed</td>
                        <td>Heating system fixed in Room 201</td>
                    </tr>
                    <tr>
                        <td>February 12, 2025</td>
                        <td>Tenant Added</td>
                        <td>Patricia Delos Reyes (Room 214)</td>
                    </tr>
                    <tr>
                        <td>February 11, 2025</td>
                        <td>Complaint Resolved</td>
                        <td>Noise complaint from Room 210</td>
                    </tr>
                    <tr>
                        <td>February 10, 2025</td>
                        <td>Payment Processed</td>
                        <td>₱2,700.00 via Bank Transfer</td>
                    </tr>
                    <tr>
                        <td>February 9, 2025</td>
                        <td>Inspection Completed</td>
                        <td>Fire safety check in all rooms</td>
                    </tr>
                    <tr>
                        <td>February 8, 2025</td>
                        <td>Tenant Updated</td>
                        <td>Contact info updated for AJ Angela Uy</td>
                    </tr>
                    <tr>
                        <td>February 6, 2025</td>
                        <td>Payment Processed</td>
                        <td>₱3,200.00 via Cash</td>
                    </tr>
                    <tr>
                        <td>February 5, 2025</td>
                        <td>Maintenance Scheduled</td>
                        <td>Plumbing work in Room 219</td>
                    </tr>
                    <tr>
                        <td>February 3, 2025</td>
                        <td>Tenant Added</td>
                        <td>Diego Morales (Room 211)</td>
                    </tr>
                    <tr>
                        <td>February 1, 2025</td>
                        <td>Payment Processed</td>
                        <td>₱2,200.00 via GCash</td>
                    </tr>
                    <tr>
                        <td>January 30, 2025</td>
                        <td>Tenant Added</td>
                        <td>Jane Doe (Room 102)</td>
                    </tr>
                    <tr>
                        <td>January 28, 2025</td>
                        <td>Complaint Resolved</td>
                        <td>AC repaired in Room 101</td>
                    </tr>
                    <tr>
                        <td>January 25, 2025</td>
                        <td>Payment Processed</td>
                        <td>₱2,500.00 via GCash</td>
                    </tr>
                    <tr>
                        <td>January 24, 2025</td>
                        <td>Maintenance Scheduled</td>
                        <td>Electrical check in Room 203</td>
                    </tr>
                    <tr>
                        <td>January 22, 2025</td>
                        <td>Tenant Moved Out</td>
                        <td>John Smith (Room 204)</td>
                    </tr>
                    <tr>
                        <td>January 20, 2025</td>
                        <td>Payment Processed</td>
                        <td>₱3,000.00 via Bank Transfer</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>