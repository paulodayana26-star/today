<?php
include "db.php";

$id = (int) $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Record not found.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Application</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background:#f4f7f6; padding:20px; }
        .box { max-width:600px; margin:auto; background:#fff; padding:30px; border-radius:8px; box-shadow:0 4px 8px rgba(0,0,0,0.1); }
        h2 { color:#2b7a78; text-align:center; }
        p { padding:8px 0; border-bottom:1px solid #eee; }
        strong { display:inline-block; width:150px; color:#555; }
        a { display:inline-block; margin-top:15px; padding:10px 15px; background:#2b7a78; color:#fff; text-decoration:none; border-radius:4px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Application Details</h2>
        <p><strong>ID:</strong> <?= htmlspecialchars($row['id']) ?></p>
        <p><strong>Full Name:</strong> <?= htmlspecialchars($row['fullname']) ?></p>
        <p><strong>Gender:</strong> <?= htmlspecialchars($row['gender']) ?></p>
        <p><strong>Reg. Date:</strong> <?= htmlspecialchars($row['reg_date']) ?></p>
        <p><strong>Marital Status:</strong> <?= htmlspecialchars($row['marital_status']) ?></p>
        <p><strong>Experience:</strong> <?= nl2br(htmlspecialchars($row['experience'])) ?></p>
        <p><strong>Terms:</strong> <?= $row['terms'] ? 'Yes' : 'No' ?></p>
        <a href="html.php">← Back to list</a>
    </div>
</body>
</html>