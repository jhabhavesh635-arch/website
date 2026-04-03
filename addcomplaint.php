<?php
session_start();
include 'config.php';

if(isset($_POST['submit'])){
    $user_id = $_SESSION['user_id'];
    $category = $_POST['category'];
    $desc = $_POST['description'];

    $query = "INSERT INTO complains(user_id,category,description) 
              VALUES('$user_id','$category','$desc')";
    mysqli_query($conn,$query);

    $success = "Complaint Added Successfully";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Complaint</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            width: 420px;
            margin: 80px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            resize: none;
        }

        textarea {
            height: 100px;
        }

        input:focus, textarea:focus {
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #0056b3;
        }

        .success {
            text-align: center;
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Add Complaint</h2>

    <?php if(isset($success)){ echo "<p class='success'>$success</p>"; } ?>

    <form method="post" id="complaintForm">
        <input type="text" name="category" placeholder="Enter Category" required>
        <textarea name="description" placeholder="Enter Description" required></textarea>
        <button name="submit">Submit Complaint</button>
    </form>
   
</div>

<script>
    // simple click animation
    const btn = document.querySelector("button");

    btn.addEventListener("click", function(){
        this.style.transform = "scale(0.95)";
        setTimeout(() => {
            this.style.transform = "scale(1)";
        }, 100);
    });

    // basic validation alert
    document.getElementById("complaintForm").addEventListener("submit", function(e){
        let category = document.querySelector("input[name='category']").value;
        let desc = document.querySelector("textarea[name='description']").value;

        if(category.trim() === "" || desc.trim() === ""){
            alert("Please fill all fields!");
            e.preventDefault();
        }
    });
</script>

</body>
</html>