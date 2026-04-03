<?php
session_start();
include 'config.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM complains WHERE user_id=$user_id";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Complaints</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            width: 80%;
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
            background: #007bff;
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

        .btn-delete {
            background: #dc3545;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #a71d2a;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>My Complaints</h2>

    <table>
        <tr>
            <th>Category</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
                <span class="status <?php echo strtolower($row['status']); ?>">
                    <?php echo $row['status']; ?>
                </span>
            </td>
            <td>
                <button class="btn-delete" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</button>
            </td>
        </tr>
        <?php } ?>

    </table>
</div>

<script>
function confirmDelete(id){
    if(confirm("Are you sure you want to delete this complaint?")){
        window.location.href = "delete_complaint.php?id=" + id;
    }
}
</script>

</body>
</html>