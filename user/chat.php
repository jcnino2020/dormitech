<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - DormiTech</title>
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
                <li><a href="chat.php" class="selected">Chat</a></li>
                <li><a href="notif.php">Notifications</a></li>
                <li><a href="profile.php">Profile</a></li>
			</ul>
        </nav>
    </header>
    <main>
		<h1>Admin Chat</h1>
        <section class="chat-container">
            <div class="chat-box">
                <div class="message left">
                    <img src="../img/ho1.png" alt="Room Image" class="avatar">
                    <div class="bubble">Hello</div>
                </div>
                <div class="message right">
                    <div class="bubble">World</div>
                    <img src="../img/ho2.png" alt="Room Image" class="avatar">
                </div>
                <div class="message left">
                    <img src="../img/ho1.png" alt="Room Image" class="avatar">
                    <div class="bubble">Grabe ka gid ya subong!</div>
                </div>
                <div class="message right">
                    <div class="bubble"> Salamat! Pirme ka kabalo magpa yuhum sa akon.</div>
                    <img src="../img/ho2.png" alt="Room Image" class="avatar">
                </div>
                <div class="message left">
                    <img src="../img/ho1.png" alt="Room Image" class="avatar">
                    <div class="bubble">Amo ini ang kamatuoran. Ang imo yuhum nagasanag sang kwarto.</div>
                </div>
                <div class="message right">
                    <div class="bubble">Aww, ginapabatyag mo ko nga special gid ko. Kamusta ka na?</div>
                    <img src="../img/ho2.png" alt="Room Image" class="avatar">
                </div>
                <div class="message left">
                    <img src="../img/ho1.png" alt="Room Image" class="avatar">
                    <div class="bubble">(User 1 disconnected.)</div>
                </div>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Type here..." id="chatInput">
            </div>
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