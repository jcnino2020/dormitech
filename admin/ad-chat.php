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
                <li><a href="ad-chat.php" class="selected">Chat</a></li>
                <li><a href="ad-profile.php">Admin</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="chat-container">
            <h1>Admin Chat</h1>
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
                    <div class="bubble">Hoy, makatilingala ka subong nga adlaw!</div>
                </div>
                <div class="message right">
                    <div class="bubble"> Salamat! Pirme ka kabalo kung paano ko pamulahon.</div>
                    <img src="../img/ho2.png" alt="Room Image" class="avatar">
                </div>
                <div class="message left">
                    <img src="../img/ho1.png" alt="Room Image" class="avatar">
                    <div class="bubble">Amo ini ang kamatuoran. Ang imo yuhum nagasanag lang sang kwarto.</div>
                </div>
                <div class="message right">
                    <div class="bubble">Aww, ginapabatyag mo ako nga pinasahi gid ako. Kamusta ka na?</div>
                    <img src="../img/ho2.png" alt="Room Image" class="avatar">
                </div>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Type here..." id="chatInput">
            </div>
        </section>
    </main>
</body>
</html>