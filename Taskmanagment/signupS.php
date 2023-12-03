<?php
session_start();

?>
<html>
    <head>
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
        
        
        $conn = mysqli_connect($servername,$username,$password,$dbname);
        ?>
         <form id="Sform" action = "signupS.php" method="post">
            <div class="container">
                <h2>Signup</h2>
                <div class="form-check">
                    <label id="labels" for="Eid">Employee Id:</label><br>
                    <input type="text" class="area" id="Eid" name="Eid"><br>
                </div>

                <div class="form-check">
                    <label id="labels" for="telp">Telephone:</label><br>
                    <input type="text" class="area" id="telp" name="telp"><br>
                    
                </div>
                
                <div class="form-check">
                    <label id="labels" for="Name">Name:</label><br>
                    <input type="text" class="area" id="Name" name="Name"><br>
                   
                </div>
                
                <div class="form-check">
                    <label id="labels" for="Email">Email:</label><br>
                    <input type="text" class="area" id="Email" name="Email"><br>
                    
                </div>

                <div class="form-check">
                    <label id="labels" for="Des">Designation:</label><br>
                    <input type="text" class="area" id="Des" name="Des"><br>
                    
                </div>

                <div class="form-check">
                    <label id="labels" for="pass">Password:</label><br>
                    <input type="password" class="area" id="Pass" name="pass"><br>
                    
                </div>

                <div class="form-check">
                    <label id="labels" for="conpass">Confirm Password:</label><br>
                    <input type="password" class="area" id="conpass" name="conpass"><br>
                
                </div>

                <div class="from-select">
                    <label for="type">Position of Employment</label><br>
                    <select name="type"  id="type">
                        <option value="Manager">Manager</option>
                        <option value="IT Manager">IT Manager</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Other Employees">Other Employees</option>
                    </select><br><br>
                </div>
                

                
                
                <button type="reset" class="btn btn-outline-secondary" id="btns" >Reset</button>
                <a href = "loging.php"><button type="button" class="btn btn-outline-secondary" id="btns">Cancel</button></a>
                <input type="submit" id="submit" name="submit" value="Submit" required>
            </div>
            </form> 

            <?php
            error_reporting(0);
            global $usname;
            global $Telp;
            global $Name;
            global $Email;
            global $Des;
            global $pass;
            global $conpass;
            global $type;
            $usname = $_POST["Eid"];
            $Telp = $_POST["telp"];
            $Name = $_POST["Name"];
            $Email = $_POST["Email"];
            $Des = $_POST["Des"];  
            $pass = $_POST["pass"];
            $conpass= $_POST["conpass"];
            $type = $_POST["type"];    
             
            
            if(empty($usname)){
               die('<br><br><center><font color="red" size="5px"> '."Employee id is required.".'</font></center>');

              
            }
            
            if(empty($Telp)){
                die('<br><br><center><font color="red" size="5px"> '."Contact Number is required.".'</font></center>');
                
            }
            
            if(empty($Name)){
                die('<br><br><center><font color="red" size="5px"> '."Your Name is required.".'</font></center>');
            }
            
            if(empty($pass)){
                die('<br><br><center><font color="red" size="5px"> '."Password is required.".'</font></center>');
            }
            
            if(empty($Des)){
                die('<br><br><center><font color="red" size="5px"> '."Designation is required.".'</font></center>');
            }
            
            if(empty($conpass)){
                die('<br><br><center><font color="red" size="5px"> '."Confirm Password is required.".'</font></center>');
            }
            
            if(! filter_var($Email, FILTER_VALIDATE_EMAIL)){
                die('<br><br><center><font color="red" size="5px"> '."Email is not valid, please check it and try agian.".'</font></center>'); 
            }
            
            if(strlen($pass)< 8 ){
                die('<br><br><center><font color="red" size="5px"> '."Password must contain atleast 8 characters".'</font></center>');
            }
            
            if(! preg_match("/[a-z]/i", $pass)){
                die('<br><br><center><font color="red" size="5px"> '."Password must contain at least one letter.".'</font></center>');
            }
            
            if(! preg_match("/[0-9]/i", $pass)){
                die('<br><br><center><font color="red" size="5px"> '."Password must contain at least one number.".'</font></center>');
            }
            if(!$conpass == $pass){
                die('<br><br><center><font color="red" size="5px"> '."Password does not match".'</font></center>');
            }
            if (isset($_POST['submit'])) { 
                if(array_key_exists('submit', $_POST)) { 
                    $sql = "INSERT INTO signup(usname,Telp,Name,Email,Des,Pass,type)
                        VALUES('$usname','$Telp', '$Name','$Email','$Des','$pass','$type')";
                    mysqli_query($conn,$sql);
                    $sql10 = "INSERT INTO employee (Eid,telephone,Name,email,Designation)
                    VALUES('$usname','$Telp', '$Name','$Email','$Des')";
                    mysqli_query($conn,$sql10);
                    $target = "loging.php";
                    $linkname = "apa";
                    link($target,$linkname);

                    
                    
            
                } 
            } 


            ?>


    </body>
</html>