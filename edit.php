<?php
include "db.php";

$id = (int) $_GET['id'];

// Update when form is submitted
if (isset($_POST['update'])) {
    $fullname       = $_POST['fullname'];
    $gender         = $_POST['gender'];
    $reg_date       = $_POST['reg_date'];
    $marital_status = $_POST['marital_status'];
    $experience     = $_POST['experience'];
    $terms          = isset($_POST['terms']) ? 1 : 0;

    $sql = "UPDATE users SET
                fullname='$fullname',
                gender='$gender',
                reg_date='$reg_date',
                marital_status='$marital_status',
                experience='$experience',
                terms=$terms
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: html.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Load current values
$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$row = mysqli_fetch_assoc($result);
if (!$row) { die("Record not found."); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Application</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background:#f4f7f6; padding:20px; }
        .box { max-width:500px; margin:auto; background:#fff; padding:30px; border-radius:8px; box-shadow:0 4px 8px rgba(0,0,0,0.1); }
        h2 { text-align:center; color:#2b7a78; }
        label { display:block; margin-top:10px; font-weight:600; }
        input[type=text], input[type=date], select, textarea {
            width:100%; padding:8px; border:1px solid #ccc; border-radius:4px; box-sizing:border-box;
        }
        button { margin-top:15px; width:100%; padding:10px; background:#2b7a78; color:#fff; border:none; border-radius:4px; cursor:pointer; }
        a { display:inline-block; margin-top:10px; color:#2b7a78; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Edit Application #<?= $row['id'] ?></h2>
        <form method="POST">
            <label>Full Name</label>
            <input type="text" name="fullname" value="<?= htmlspecialchars($row['fullname']) ?>" required>

            <label>Gender</label>
            <select name="gender" required>
                <option value="male"   <?= $row['gender']=='male'?'selected':'' ?>>Male</option>
                <option value="female" <?= $row['gender']=='female'?'selected':'' ?>>Female</option>
                <option value="other"  <?= $row['gender']=='other'?'selected':'' ?>>Other</option>
            </select>

            <label>Reg. Date</label>
            <input type="date" name="reg_date" value="<?= htmlspecialchars($row['reg_date']) ?>" required>

            <label>Marital Status</label>
            <select name="marital_status" required>
                <option value="single"  <?= $row['marital_status']=='single'?'selected':'' ?>>Single</option>
                <option value="married" <?= $row['marital_status']=='married'?'selected':'' ?>>Married</option>
                <option value="other"   <?= $row['marital_status']=='other'?'selected':'' ?>>Other</option>
            </select>

            <label>Experience</label>
            <textarea name="experience" rows="4"><?= htmlspecialchars($row['experience']) ?></textarea>

            <label>
                <input type="checkbox" name="terms" <?= $row['terms'] ? 'checked' : '' ?>> Agree to terms
            </label>

            <button type="update" name="update">Update</button>
        </form>
        <a href="html.php">← Back to list</a>
    </div>
</body>
</html>