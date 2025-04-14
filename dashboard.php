<?php
require_once 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DormiTech</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.png" href="dashboard.php" alt="DORMITECH Logo" >
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.php" class="selected">Home</a></li>
                <li><a href="user/payments.php">Payments</a></li>
                <li><a href="user/complaints.php">Complaints</a></li>
                <li class=""><a href="user/chat.php">Chat</a></li>
                <li class=""><a href="user/notif.php">Notifications</a></li>
                <li><a href="user/profile.php">Profile</a></li>
			</ul>
        </nav>
    </header>
    <main>
        <h1>Hello, Juan!</h1>
        <section class="welcome">
            <div class="status-box">
                <h2>Rent Due</h2>
                <p><span class="highlight">3 Days Left</span></p>
            </div>
            <div class="status-box">
                <h2>Complaints</h2>
                <p><span class="highlight">1 Pending</span></p>
            </div>
        </section>

        <section class="actions">
            <button>Pay Rent</button>
            <button>Submit Complaint</button>
            <button>Virtual Tour</button>
            <button>Chat with Admin</button>
        </section>

        <section class="announcements">
            <h3>Announcements</h3>
            <ul>
                <li>Water Shutdown on Feb 14</li>
                <li>Fire Drill on Feb 29</li>
                <li>New Laundry Room Hours Effective March 15</li>
                <li>Important Update on Parking Regulations on April 1</li>
                <li>Pool Opening and Safety Guidelines on May 1</li>
                <li>Community Clean-Up Day on March 5</li>
            </ul>
        </section>

        <section class="available-rooms">
            <h3>Available Rooms</h3>
            <div class="room-list">
                <div class="room-item">
                    <div class="image-container">
                        <img src="img/ho1.png" alt="Room 101">
                    </div>
                    <h4>Room 101</h4>
                    <p>₱2,000/month</p>
                    <button>Book Now</button>
                </div>
                <div class="room-item">
                    <div class="image-container">
                        <img src="img/ho2.png" alt="Room 102">
                    </div>
                    <h4>Room 102</h4>
                    <p>₱3,000/month</p>
                    <button>Book Now</button>
                </div>
                <div class="room-item">
                    <div class="image-container">
                        <img src="img/ho3.png" alt="Room 103">
                    </div>
                    <h4>Room 103</h4>
                    <p>₱4,000/month</p>
                    <button>Book Now</button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>