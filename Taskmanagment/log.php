<html>
    <head> <title> Login </title>
    
        <script>
            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        <link rel="stylesheet" href="stylefill.css">
        

    </head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";


$conn = mysqli_connect($servername,$username,$password,$dbname);



?>
<div class="gh">
    <form method="POST" action="log.php">
    <label>Name : </label>
    <input type="text" name="Name" id="Name"><br><br>

    <label>Email ; </label>
    <input type="email" name="email" id="email" required><br><br>

    <label>Contact Number</label>
    <input type="text" name="num"id="num"><br><br>

    <label>Password </label>
    <input type="text" name="pass" id="pass"><br><br>

    <label>Conform password </label>
    <input type="password" name="cpass" id="cpass"><br><br>

    <input type="submit" name="Submit" id="Submit" >
    </form>


    <?php
    if(!$conn){
        die ("Connection failed: ". mysqli_connect_error());
    }
    $sql = "SELECT employee.Eid,employee.Name FROM employee INNER JOIN  assign ON assign.Eid = employee.Eid";
  

    $result = $conn->query($sql);
   
    ?>

</div>


</body>

</html>
