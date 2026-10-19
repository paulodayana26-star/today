<?php
include("process.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Job Application Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }

        .form-container, .table-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }

        .form-group { margin-bottom: 15px; }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555555;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea { resize: vertical; height: 100px; }

        .radio-group, .checkbox-group {
            display: flex;
            gap: 15px;
            margin-top: 5px;
        }

        .radio-group label, .checkbox-group label {
            display: inline;
            font-weight: normal;
            cursor: pointer;
        }

        button {
            width: 100%;
            background-color: #2b7a78;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover { background-color: #17252a; }
    </style>
</head>
<body>

<!-- ============ FORM ============ -->
<div class="form-container">
    <h2>Job Application Form</h2>
    <form action="process.php" method="POST">

        <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="male" required> Male</label>
                <label><input type="radio" name="gender" value="female"> Female</label>
                <label><input type="radio" name="gender" value="other"> Other</label>
            </div>
        </div>

        <div class="form-group">
            <label for="reg-date">Registration Date:</label>
            <input type="date" id="reg-date" name="reg_date" required>
        </div>

        <div class="form-group">
            <label for="marital-status">Marital Status:</label>
            <select id="marital-status" name="marital_status" required>
                <option value="" disabled selected>Select status</option>
                <option value="single">Unmarried (Single)</option>
                <option value="married">Married</option>
                <option value="other">Others</option>
            </select>
        </div>

        <div class="form-group">
            <label for="experience">Work Experience / Cover Letter:</label>
            <textarea id="experience" name="experience" placeholder="Tell us about your professional background..."></textarea>
        </div>

        <div class="form-group checkbox-group">
            <label>
                <input type="checkbox" name="terms" required> I agree to the terms and conditions.
            </label>
        </div>

        <button type="submit" name="submit">Submit Application</button>
    </form>
</div>

<!-- ============ DATA TABLE (INLINE CSS) ============ -->
<div style="background-color:#ffffff; padding:30px; border-radius:8px; box-shadow:0 4px 8px rgba(0,0,0,0.1); width:100%; max-width:900px; box-sizing:border-box;">
    <h2 style="text-align:center; color:#333333; margin-bottom:20px;">Submitted Applications</h2>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id");
    if ($result && mysqli_num_rows($result) > 0) {
    ?>
        <table style="width:100%; border-collapse:collapse; font-size:14px;">
            <thead>
                <tr>
                    <th style="border:1px solid #ddd; padding:10px; text-align:left; background-color:#2b7a78; color:#ffffff; font-weight:600;">ID</th>
                    <th style="border:1px solid #ddd; padding:10px; text-align:left; background-color:#2b7a78; color:#ffffff; font-weight:600;">Full Name</th>
                    <th style="border:1px solid #ddd; padding:10px; text-align:left; background-color:#2b7a78; color:#ffffff; font-weight:600;">Gender</th>
                    <th style="border:1px solid #ddd; padding:10px; text-align:left; background-color:#2b7a78; color:#ffffff; font-weight:600;">Reg. Date</th>
                    <th style="border:1px solid #ddd; padding:10px; text-align:left; background-color:#2b7a78; color:#ffffff; font-weight:600;">Marital Status</th>
                    <th style="border:1px solid #ddd; padding:10px; text-align:left; background-color:#2b7a78; color:#ffffff; font-weight:600;">Experience</th>
                    <th style="border:1px solid #ddd; padding:10px; text-align:left; background-color:#2b7a78; color:#ffffff; font-weight:600;">Terms</th>
                    <!-- ✅ ADDED: Actions column -->
                    <th style="border:1px solid #ddd; padding:10px; text-align:left; background-color:#2b7a78; color:#ffffff; font-weight:600;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1; // Initialize ID counter
        
                 while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td style="border:1px solid #ddd; padding:10px;"><?= $id++?></td>
                        <td style="border:1px solid #ddd; padding:10px;"><?= htmlspecialchars($row['fullname']) ?></td>
                        <td style="border:1px solid #ddd; padding:10px;"><?= htmlspecialchars($row['gender']) ?></td>
                        <td style="border:1px solid #ddd; padding:10px;"><?= htmlspecialchars($row['reg_date']) ?></td>
                        <td style="border:1px solid #ddd; padding:10px;"><?= htmlspecialchars($row['marital_status']) ?></td>
                        <td style="border:1px solid #ddd; padding:10px;"><?= htmlspecialchars($row['experience']) ?></td>
                        <td style="border:1px solid #ddd; padding:10px;"><?= $row['terms'] ? 'Yes' : 'No' ?></td>

                        <!-- ✅ ADDED: View / Edit / Delete buttons -->
                        <td style="border:1px solid #ddd; padding:10px; white-space:nowrap;">
                            <a href="view.php?id=<?= $row['id'] ?>"
                               style="display:inline-block; padding:6px 10px; margin-right:4px; background-color:#2b7a78; color:#fff; text-decoration:none; border-radius:4px; font-size:12px;">View</a>

                            <a href="edit.php?id=<?= $row['id'] ?>"
                               style="display:inline-block; padding:6px 10px; margin-right:4px; background-color:#f0ad4e; color:#fff; text-decoration:none; border-radius:4px; font-size:12px;">Edit</a>

                            <a href="delete.php?id=<?= $row['id'] ?>"
                               onclick="return confirm('Are you sure you want to delete this record?');"
                               style="display:inline-block; padding:6px 10px; background-color:#d9534f; color:#fff; text-decoration:none; border-radius:4px; font-size:12px;">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p style="text-align:center; color:#888888; font-style:italic;">No applications submitted yet.</p>
    <?php } ?>
</div>

</body>
</html>