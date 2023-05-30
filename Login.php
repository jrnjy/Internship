<?php
       $email = $_POST["email"];
       $password = $_POST["password"];
       $conn = new mysqli('localhost', 'root', '', 'travel');
       if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	    } 
        else{
            $stmt = $conn->prepare("select * from travels where email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result =$stmt->get_result();
            if($result->num_rows > 0){
                $data =$result->fetch_assoc();
                if($data['password'] === $password){
                    echo "<h1>Login Sucessfully</h1>";
                    echo "<script>location.replace('Home.html')</script>";
                }
                else{
                    echo "<h1>Invail Credentials</h1>";
                }
            }
            else{
                echo "<h1>Invail Credentials</h1>";
            }

        }
?>
