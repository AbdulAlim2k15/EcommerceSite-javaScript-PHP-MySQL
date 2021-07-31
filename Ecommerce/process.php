<?php
 $username = $_POST['user'];
 $email = $_POST['mail'];
 $password =md5($_POST['pass']);
 $cpassword =md5( $_POST['cpass']);
 

 
    

    if($password != $cpassword){  
        echo '<script>alert("password not matched!\r\nPlease insert valid password")</script>'; 
    }
    
    else{
        $con = new mysqli("localhost","root","","ecommerce");

        if($con->connect_error){
            die("Connect failed :".$con->connect_error);
        }
        else{
            $stmt = $con->prepare("insert into user_info(name,email,password) values(?,?,?)");
            $stmt->bind_param("sss",$username,$email,$password);
            $stmt->execute();
            echo ' <script>
                $confirm =  "Sign up Successful";
                document.getElementById("sign").innerhtml =  $confirm;
             </script>';

            echo '<script>alert("Sign Up Successful1!")</script>';    
            $stmt->close();
            $con->close();
            }
        }

    
    
    

?>