<?php
session_start();
include 'config.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM users 
              WHERE email='$email' AND password='$pass'";
    
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];

        // 👉 auto dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid Login";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            width: 350px;
            margin: 100px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        input:focus {
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Login</h2>

    <?php if(isset($error)){ echo "<p class='error'>$error</p>"; } ?>

    <form method="post">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button name="login">Login</button>
    </form>
</div>

</body>
</html>