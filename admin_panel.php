<?php
// admin/admin_panel.php
session_start();
include('db.php'); // Include database connection

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

// Fetch users and license keys
$users = mysqli_query($conn, "SELECT * FROM Users");
$licenses = mysqli_query($conn, "SELECT * FROM LicenseKeys");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .box {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 45%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .logout {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Admin Panel</h1>

    <div class="container">
        <!-- Users Table -->
        <div class="box">
            <h3>Users</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>License Key</th>
                </tr>
                <?php while ($user = mysqli_fetch_assoc($users)) { ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['license_key']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <!-- License Keys Table -->
        <div class="box">
            <h3>License Keys</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Key</th>
                    <th>Status</th>
                    <th>Expiry Date</th>
                </tr>
                <?php while ($license = mysqli_fetch_assoc($licenses)) { ?>
                    <tr>
                        <td><?php echo $license['id']; ?></td>
                        <td><?php echo $license['key']; ?></td>
                        <td><?php echo $license['status']; ?></td>
                        <td><?php echo $license['expiry_date']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <div class="logout">
        <a href="logout.php"><button>Logout</button></a>
    </div>
</body>
</html>
