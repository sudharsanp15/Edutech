<?php
session_start();
include '../backend/db_conn.php'; // Assuming you have a db_conn.php for database connection

$sql = "SELECT a.account_holder, a.contact_no, a.email, a.image_path
        FROM accounts a
        JOIN courseregistrations c ON a.email = c.email
        WHERE c.payment = 'Pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pending Payment Account Details</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }
        .button:hover {background-color: #3e8e41}
        .button:active {
            background-color: #3e8e41;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>
</head>
<body>
    <h2>Pending Payment Account Details</h2>
    <table>
        <tr>
            <th>Account Holder</th>
            <th>Contact Number</th>
            <th>Email</th>
           
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['account_holder']; ?></td>
                    <td><?php echo $row['contact_no']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    
                    <td><img src="<?php echo $row['image_path']; ?>" alt="Image" width="100"></td>
                    <td>
                        <form method="post" action="../backend/updatepaymentstatus.php">
                            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                            <button class="button" type="submit">Confirm Payment</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No pending payment records found</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
