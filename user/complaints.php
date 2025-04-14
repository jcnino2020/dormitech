<?php
session_start();

require_once '../auth.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: /dormitech2/login.php");
    exit;
}

require_once '../thirdparty/fpdf.php'; 

function generateComplaintHistoryPDF($complaint_history, $user_details) {
    $pdf = new FPDF();
    $pdf->AddPage();

    $left_margin = 10;
    $right_margin = 10;
    $pdf->SetMargins($left_margin, 10, $right_margin);

    $pdf->Image('../img/logob.png', 10, 10, 60); 

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 6, 'Complaint Report', 0, 1, 'R');
    $pdf->Ln(5);

    $profile_picture_path = '../' . $user_details['Profile_Picture'];
    if (file_exists($profile_picture_path)) {
        $pdf->Image($profile_picture_path, $left_margin, $pdf->GetY(), 30, 0, '', '');
        $pdf->Ln(h:3); 
    } else {
        $pdf->Cell(0, 10, 'No Profile Picture Available', 0, ln: 1, align: 'R');
    }
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetX(42); 
    $pdf->Cell(0, 6, 'Name: ' . $user_details['First_Name'] . ' ' . $user_details['Last_Name'], 0, 1, 'L');
    $pdf->SetX(42); 
    $pdf->Cell(0, 6, 'Room Number: ' . $user_details['Room_Number'], 0, 1, 'L');
    $pdf->SetX(42);
    $pdf->Cell(0, 6, 'Email: ' . $user_details['Email'], 0, 1, 'L');
    $pdf->Ln(10);

    $pdf->Line(20, 60, 210-20, 60); 

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 6, 'Complaint History', 0, 1, 'C');
    $pdf->Ln(2);

    $pdf->SetFont('Arial', 'B', 12);
    $header = array('Date', 'Subject', 'Category', 'Status');
    $page_width = $pdf->GetPageWidth();
    $available_width = $page_width - ($left_margin + $right_margin);
    $relative_widths = array(0.2, 0.4, 0.2, 0.2);
    $w = array();
    foreach ($relative_widths as $rel_width) {
        $w[] = $available_width * $rel_width;
    }
    foreach ($header as $key => $value) {
        $pdf->Cell($w[$key], 10, $value, 1, 0, 'C');
    }
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);
    foreach ($complaint_history as $row) {
        $pdf->Cell($w[0], 10, substr($row['date'], 0, 10), 1, 0, 'C');
        $pdf->Cell($w[1], 10, htmlspecialchars($row['subject']), 1, 0, 'C');
        $pdf->Cell($w[2], 10, htmlspecialchars($row['category']), 1, 0, 'C');
        $pdf->Cell($w[3], 10, htmlspecialchars($row['status']), 1, 0, 'C');
        $pdf->Ln();
    }
    return $pdf;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT date, subject, category, status FROM Complaints WHERE user_id = ? ORDER BY date DESC";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $complaint_history = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
} else {
    die("Database error: " . $conn->error);
}

$sql_user = "SELECT First_Name, Last_Name, Room_Number, Email, Profile_Picture FROM Users WHERE User_ID = ?";
$stmt_user = $conn->prepare($sql_user);
if ($stmt_user) {
    $stmt_user->bind_param("i", $user_id);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();
    $user_details = $result_user->fetch_assoc();
    $stmt_user->close();
} else {
    die("Database error: " . $conn->error);
}

if (isset($_GET['generate_pdf'])) {
    $pdf = generateComplaintHistoryPDF($complaint_history, $user_details);
    $pdf->Output(); 
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints - DormiTech</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
    <style>
        .download-pdf-btn {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .download-pdf-btn:hover {
            background-color: #0056b3;
        }
    </style>
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
                <li><a href="complaints.php" class="selected">Complaints</a></li>
                <li><a href="chat.php">Chat</a></li>
                <li><a href="notif.php">Notifications</a></li>
                <li><a href="profile.php">Profile</a></li>
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
        <h1>Submit Complaint</h1>
        <section class="complaint-form">
            <form id="complaintForm" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" placeholder="Enter subject" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Roommate Issues">Roommate Issues</option>
                        <option value="Security">Security</option>
                        <option value="Cleanliness">Cleanliness</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" placeholder="Describe your issue in detail..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="attachment">Attachment (if any):</label>
                    <input type="file" id="attachment" name="attachment">
                </div>
                <button type="submit" name="submit_complaint" class="submit-button">Submit Complaint</button>
            </form>
        </section>

        <section class="payment-history">
            <h3>Complaint History</h3>
            <form method="GET" class="search-form">
                <input type="text" name="search" placeholder="Search complaints...">
                <button type="submit">Search</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Subject</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($complaint_history)): ?>
                        <?php foreach ($complaint_history as $complaint): ?>
                            <tr>
                                <td><?= htmlspecialchars($complaint['date']) ?></td>
                                <td><?= htmlspecialchars($complaint['subject']) ?></td>
                                <td><?= htmlspecialchars($complaint['category']) ?></td>
                                <td><?= htmlspecialchars($complaint['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No complaints found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <button type="button" class="download-pdf-btn" onclick="window.location.href='?generate_pdf=1';">Download PDF</button>
        </section>
    </main>
</body>
</html>