<?php
session_start();

require_once '../auth.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['next_url'] = $_SERVER['REQUEST_URI'];
    header("Location: ../login.php");
    exit;
}

require_once '../thirdparty/fpdf.php'; 

function generatePaymentHistoryPDF($payment_history, $user_details) {
    $pdf = new FPDF();

    $pdf->AddPage();

    $left_margin = 10;
    $right_margin = 10;
    $pdf->SetMargins($left_margin, 10, $right_margin);

    $pdf->Image('../img/logob.png', 10, 10, 60); 

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 6, 'Status Report', 0, 1, 'R');
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
    $pdf->SetX(42);
    $pdf->Cell(0, 6, 'Rent Due: PHP ' . number_format($user_details['Rent_Due'], 2), 0, 1, 'L');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 6, 'Payment History', 0, 1, 'C');
    $pdf->Ln(2);

    $pdf->SetFont('Arial', 'B', 12);
    $header = array('Date', 'Amount', 'Method', 'Status');

    $page_width = $pdf->GetPageWidth();
    $available_width = $page_width - ($left_margin + $right_margin);

    $relative_widths = array(0.3, 0.2, 0.25, 0.25);

    $w = array();
    foreach ($relative_widths as $rel_width) {
        $w[] = $available_width * $rel_width;
    }

    foreach ($header as $key => $value) {
        $pdf->Cell($w[$key], 10, $value, 1, 0, 'C');
    }
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);
    foreach ($payment_history as $row) {
        $pdf->Cell($w[0], 10, substr($row['PaymentDate'], 0, 10), 1, 0, 'C');
        $pdf->Cell($w[1], 10, 'PHP ' . number_format($row['Amount'], 2), 1, 0, 'C');
        $pdf->Cell($w[2], 10, $row['PaymentMethod'], 1, 0, 'C');
        $pdf->Cell($w[3], 10, $row['Status'], 1, 0, 'C');
        $pdf->Ln();
    }

    return $pdf;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT PaymentDate, Amount, PaymentMethod, Status FROM Payments WHERE User_ID = ? ORDER BY PaymentDate DESC";
$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $payment_history = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
} else {
    die("Database error: " . $conn->error);
}

$sql_user = "SELECT First_Name, Last_Name, Room_Number, Email, Rent_Due, Profile_Picture FROM Users WHERE User_ID = ?";
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
    $pdf = generatePaymentHistoryPDF($payment_history, $user_details);
    $pdf->Output(); 
    exit;
}

$sql_chart = "SELECT DATE_FORMAT(PaymentDate, '%Y-%m') AS Month, SUM(Amount) AS TotalAmount 
              FROM Payments 
              WHERE User_ID = ? 
              GROUP BY DATE_FORMAT(PaymentDate, '%Y-%m') 
              ORDER BY PaymentDate ASC";
$stmt_chart = $conn->prepare($sql_chart);
if ($stmt_chart) {
    $stmt_chart->bind_param("i", $user_id);
    $stmt_chart->execute();
    $result_chart = $stmt_chart->get_result();
    $chart_data = $result_chart->fetch_all(MYSQLI_ASSOC);
    $stmt_chart->close();
} else {
    die("Database error: " . $conn->error);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments - DormiTech</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #paymentChart {
            height: 300px !important;
        }
        .download-pdf-btn {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #00000;
            color: white;
            border: none;
            cursor: pointer;
            display: inline-block;
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
                <li><a href="payments.php" class="selected">Payments</a></li>
                <li><a href="complaints.php">Complaints</a></li>
                <li><a href="chat.php">Chat</a></li>
                <li><a href="notif.php">Notifications</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Payments and Details</h1>

        <!-- Button to Generate PDF (Before Chart) -->
        <div class="rent-details">
            <div class="detail-item"><b>Current Month:</b> <?= htmlspecialchars(date('F Y')) ?></div>
            <div class="detail-item"><b>Rent Amount:</b> ₱<?= number_format(2500.00, 2) ?></div>
            <div class="detail-item"><b>Due Date:</b> <?= htmlspecialchars(date('F d, Y', strtotime('last day of this month'))) ?></div>
            <div class="detail-item"><b>Status:</b> Pending</div>
        </div>

        <section class="payment-methods">
            <h3>Payment Methods</h3>
            <div class="buttons-container">
                <button class="payment-btn gcash">GCash</button>
                <button class="payment-btn maya">Maya</button>
                <button class="payment-btn card">Debit/Credit Card</button>
            </div>
        </section>

        <section class="payment-history">
            <h3>Payment History</h3>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($payment_history)): ?>
                        <?php foreach ($payment_history as $payment): ?>
                            <tr>
                                <td><?= htmlspecialchars($payment['PaymentDate']) ?></td>
                                <td>₱<?= number_format($payment['Amount'], 2) ?></td>
                                <td><?= htmlspecialchars($payment['PaymentMethod']) ?></td>
                                <td><?= htmlspecialchars($payment['Status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No payment history found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <button type="button" class="download-pdf-btn" onclick="window.location.href='?generate_pdf=1';">Download PDF</button>
        </section>

        <!-- Add Payment Chart -->
        <section class="payment-chart">
            <h3>Monthly Payment Totals</h3>
            <canvas id="paymentChart"></canvas>
        </section>

    </main>

    <script>

        const months = [<?php echo '"' . implode('","', array_column($chart_data, 'Month')) . '"'; ?>];
        const amounts = [<?php echo implode(',', array_column($chart_data, 'TotalAmount')); ?>];

        const ctx = document.getElementById('paymentChart').getContext('2d');
        const paymentChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Total Payments (₱)',
                    data: amounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '₱' + value.toFixed(2);
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += '₱' + context.parsed.y.toFixed(2);
                                return label;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>