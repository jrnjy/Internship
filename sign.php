<?php
    $first = $_POST["first"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];
    $conn = new mysqli('localhost', 'root', '', 'travel');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 
    else{
            if(($password == $confirm)){
                $stmt = $conn->prepare("insert into travels(first, last, email, password) values(?, ?, ?, ?)");
                $stmt->bind_param("ssss", $first, $last, $email, $password);
                $stmt->execute();
                echo "<script>alert('Registration successful...')</script>";
                echo "<script>location.replace('Home.html')</script>";
                $stmt->close();
                $conn->close();
            }
            else{
                echo "<h1>Passwords do not match</h1>";
            }
    }
?>
