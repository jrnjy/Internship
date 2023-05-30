<?php
    $con = mysqli_connect('localhost', 'root', '', 'travel');
    
    if(!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "Success connect to db";

    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $query = $_POST["desc"];

    /* $sql = "INSERT INTO `travel`.`rev` (`name`, `age`, `gender`, `email`, `phone`, `query`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$query');";

    $con -> close(); */
    //echo $sql;

    $stmt = $con->prepare("insert into rev(name, age, gender, email, phone, query) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissis", $name, $age, $gender, $email, $phone, $query);
    $stmt->execute();
    echo "<script>alert('Review sent successfully...')</script>";
    echo "<script>location.replace('Home.html')</script>";
    $stmt->close();
    $con->close();
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christ Travel Agency</title>
    <link rel="stylesheet" href="Demo_style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pangolin">

</head>
<body> 
    <div class="container">
        <h1>POST YOUR COMMENTS AND REVIEWS</h1>    <br>
        <p>Enter your details and submit this form to raise any queries.</p> 
        <br>

        <form action="Home.html" method="post">
            Enter Name: <input type="text" name="name" id="name" placeholder="Enter your name"><br>
            Enter Age: <input type="text" name="age" id="age" placeholder="Enter your age"><br>
            Enter Sex: <input type="text" name="gender" id="gender" placeholder="Enter your gender"><br>
            Enter E-mail: <input type="email" name="email" id="email" placeholder="Enter your email"><br>
            Enter Phone Number: <input type="phone" name="phone" id="phone" placeholder="Enter your phone"><br>
            Enter queries if any: <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Write a Review"></textarea> <br>
            <button type="submit" > Submit </button> <br>
        </form>
    </div>
</body>
</html> -->