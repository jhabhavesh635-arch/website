<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            width: 400px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 25px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            text-decoration: none;
            color: white;
            background: #007bff;
            border-radius: 6px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #0056b3;
        }

        .logout {
            background: #dc3545;
        }

        .logout:hover {
            background: #a71d2a;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Welcome User 👋</h2>

    <a href="addcomplaint.php" class="btn">➕ Add Complaint</a>
    <a href="mycomplaints.php" class="btn">📋 My Complaints</a>
    <a href="logout.php" class="btn logout">🚪 Logout</a>
</div>

<script>
    // simple click animation
    const buttons = document.querySelectorAll('.btn');

    buttons.forEach(btn => {
        btn.addEventListener('click', function(){
            this.style.transform = "scale(0.95)";
            setTimeout(() => {
                this.style.transform = "scale(1)";
            }, 100);
        });
    });
</script>

</body>
</html>