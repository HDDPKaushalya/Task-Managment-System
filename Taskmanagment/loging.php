<html>
    <head> <title> Register tasks </title>
    
        <script>
            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
         <style>
                html, body {
                    height: 100%;
                  }

                html {
                 display: table;
                  margin: auto;
                }
                body{
                    font-family: Arial, sans-serif;
                    margin: 100pt;
                    padding: 0;
                   align-items: center;
                  justify-content: center;
                  font-size: 10pt;
                  
                  
                   min-height: 100vh;
                   background: url('Img.jpg') no-repeat center center fixed;
                  background-size: cover;
                  
                
                }
                .container {
                max-width: 400px;
                padding: 20px;
                background-color: rgba(255, 255, 255, 0.8);
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
        }

    </style>

    </head>
<body>  
<?php

$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";
global $conn;


$conn = mysqli_connect($servername,$username,$password,$dbname);



?>
<form id="Sform" action = "loging.php" method="post">
            <div class="container">
                <h2>Loging</h2>
                <div class="form-check">
                    <label id="labels" for="Eid">Employee Id:</label><br>
                    <input type="text" class="area" id="Eid" name="Eid"><br><br>
                </div>

                <div class="form-check">
                    <label id="labels" for="pass">Password:</label><br>
                    <input type="password" class="area" id="pass" name="pass"><br><br>
                    
                </div>
                <a href = "HomePage.html"><button type="button" class="btn btn-outline-secondary234" id="btns2">Login</button></a><br>
                <!--<input type="submit" id="submit" name="submit" value="Loging" required><br>-->
                <a href = "signupS.php"><button type="button" class="btn btn-outline-secondary" id="btns">Signup</button></a>
        </form>

        <?php
       error_reporting(0);
        global $Eid;
        global $pass;
        $Eid = $_POST["Eid"];
        $pass = $_POST["pass"];
        if(empty($Eid)){
            die('<br><br><center><font color="red" size="5px"> '."Employee id is required.".'</font></center>');
         }
         if(empty($pass)){
            die('<br><br><center><font color="red" size="5px"> '."Password is required.".'</font></center>');
        }
        
        $sql2 = "SELECT usname,Pass FROM signup";
        $taconn = mysqli_query($conn, $sql2);
        $result12 = $conn->query($sql2);
       $ty ="Dakshina";
       $tr ="Dakshina123";

       if (isset($_POST['submit'])) { 
             if(array_key_exists('submit', $_POST)) { 
                if($Eid == $ty &&  $Pass == $tr){
                    date_default_timezone_set("Asia/Colombo");
                    $time = date("h:i:sa");
                    $sql = "INSERT INTO logingout(Pass,logintime,Eid)
                        VALUES('$pass','$time','$Eid')";
                    mysqli_query($conn,$sql);
               
                    
                        $target = "HomePage.html";
                        $linkname = "apa";
                        link($target,$linkname);
    

                    }else{
                        die('<br><br><center><font color="red" size="5px"> '."Employee id or Password worng.".'</font></center>');
                        
                
                    } 
                }
            }

            
        


       
       /*
     $sql = "SELECT usname,Pass FROM signup WHERE usname = '$Eid' AND Pass = '$Pass'";
      $stmt = $conn->prepare($sql);
      //$stmt->bind_param("ss", $Eid, $Pass);
      $stmt->execute();

      $result = $stmt->get_result();
      if ($result->num_rows == 1) {
       
        echo "Login successful. Welcome, $Eid!";
       
    } else {
        
        echo "Login failed. Please check your username and password.";
    }
     if($Eid == $ty &&  $Pass == $tr){
                        date_default_timezone_set("Asia/Colombo");
                        $time = date("h:i:sa");
                        $sql = "INSERT INTO logingout(Pass,logintime,Eid)
                            VALUES('$pass','$time','$Eid')";
                        mysqli_query($conn,$sql);
    $stmt->close();
    $conn->close();
    */
       ?> 

      



