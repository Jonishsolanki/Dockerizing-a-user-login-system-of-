    <?php      
        include('connection.php');  
        $username = $_POST['user'];  
        $password = $_POST['pass'];  
          
            //to prevent from mysqli injection  
            $username = stripcslashes($username);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($con, $username);  
            $password = mysqli_real_escape_string($con, $password);  
          
            $sql = "select *from user where username = '$username' and password = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            $name=$row['Name'];
             
            //count is number of users
   
            if($count){  
                echo "<h1><center> HEllO! This is $name!!</center></h1>";  
                echo "";
                echo "<p>";
                     echo "Name: ";
                     echo $row['Name']; 
		     echo "<br>";
		     echo "Roll Number: ";
		     echo $row['RollNumber'];
		     echo "<br>";
		     echo "Age: ";
		     echo $row['Age'];
		     echo "</p>";
                     echo "<style>";
		     echo "p{ font-size:50px;}";
                     echo "</style>";
            }  
            else{  
                echo "<h1> Login failed. Invalid username or password.</h1>";  
            }     
    ?>  
