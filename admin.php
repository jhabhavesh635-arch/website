<?php
session_start();
include 'config.php';

$query = "SELECT * FROM complains";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            width: 85%;
            margin: 50px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #343a40;
            color: white;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .status {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
        }

        .pending {
            background: orange;
        }

        .resolved {
            background: green;
        }

        .btn {
            padding: 6px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
        }

        .solve {
            background: #28a745;
        }

        .solve:hover {
            background: #1e7e34;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Admin Complaint Panel</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
                <span class="status <?php echo strtolower($row['status']); ?>">
                    <?php echo $row['status']; ?>
                </span>
            </td>
            <td>
                <button class="btn solve" onclick="updateStatus(<?php echo $row['id']; ?>)">
                    Mark Solved
                </button>
            </td>
        </tr>
        <?php } ?>

    </table>
</div>

<script>
function updateStatus(id){
    if(confirm("Mark this complaint as resolved?")){
        window.location.href = "update_status.php?id=" + id;
    }
}
</script>

</body>
</html>