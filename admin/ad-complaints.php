<?php
session_start();
require_once '../auth.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: ../login.php");
    exit;
}

$error = '';
$successMessage = '';

// Handle status update functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $complaint_id = $_POST['complaint_id'];
    $new_status = $_POST['status'];

    if (in_array($new_status, ['Resolved', 'Pending', 'In Progress'])) {
        $sql = "UPDATE Complaints SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("si", $new_status, $complaint_id);
            if ($stmt->execute()) {
                $successMessage = "Complaint status updated successfully!";
            } else {
                $error = "Error updating complaint status. Please try again.";
            }
            $stmt->close();
        } else {
            $error = "Database error: " . $conn->error;
        }
    } else {
        $error = "Invalid status selected.";
    }
}

// Fetch all complaints for display
$complaints = [];
$sql = "SELECT c.id, c.date, u.name AS tenant_name, c.category, c.status 
        FROM Complaints c 
        JOIN Users u ON c.user_id = u.id 
        ORDER BY c.date DESC";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
    $complaints = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
} else {
    $error = "Database error: " . $conn->error;
}
$conn->close();
?>

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
                <li><a href="ad-complaints.php" class="selected">Complaints</a></li>
                <li><a href="ad-chat.php">Chat</a></li>
                <li><a href="ad-profile.php">Admin</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php if (!empty($error)): ?>
            <div class="error-message"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (!empty($successMessage)): ?>
            <div class="success-message"><?= htmlspecialchars($successMessage) ?></div>
        <?php endif; ?>

        <h1>Manage Complaints</h1>
        <div class="ad-complaint-container">
            <div class="ad-complaint-record">
                <div class="search-bar">
                    <form method="GET" action="">
                        <input type="text" name="search" placeholder="Search complaints..." value="<?= htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : '') ?>">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <h3>Complaint Record</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Tenant</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($complaints)): ?>
                            <?php foreach ($complaints as $complaint): ?>
                                <tr>
                                    <td><?= htmlspecialchars($complaint['date']) ?></td>
                                    <td><?= htmlspecialchars($complaint['tenant_name']) ?></td>
                                    <td><?= htmlspecialchars($complaint['category']) ?></td>
                                    <td><?= htmlspecialchars($complaint['status']) ?></td>
                                    <td>
                                        <form method="POST" style="display:inline;">
                                            <input type="hidden" name="complaint_id" value="<?= htmlspecialchars($complaint['id']) ?>">
                                            <select name="status" onchange="this.form.submit()">
                                                <option value="Pending" <?= $complaint['status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                <option value="In Progress" <?= $complaint['status'] === 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                                                <option value="Resolved" <?= $complaint['status'] === 'Resolved' ? 'selected' : '' ?>>Resolved</option>
                                            </select>
                                            <input type="hidden" name="update_status" value="true">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No complaints found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>