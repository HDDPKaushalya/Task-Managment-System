html>
    <head> <title> Register tasks </title>
    
        <script>
            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
        </script>

    </head>
<body> 
    <label for="Eid">Enter the Eid:</label>
    <input type="text"  id="Eid" name="Eid"><br><br>




<?php
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";
global $conn;


$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT employee.Eid assign.Tid FROM employee , assign WHERE employee.Eid = '$Eid' AND assign.Eid = employee.Eid";

$result = $conn -> query($sql);



global $Eid;
$Eid = $_POST["Eid"];

while ($row = $result->fetch_assoc()) {
    foreach($row as $ind => $val)
    {
    echo "$ind: ";
     $sql2 = "SELECT taskactivities.activityid,taskactivities.activity FROM taskactivities  INNER JOIN  assign ON assign.Tid = '$val' AND assign.Tid = taskactivities.Tid";
     $result1 = $conn ->query($sql2);
     while ($row = $result1->fetch_assoc()) {
        foreach($row as $ind1 => $val2){
            echo "$ind1: $val2";


        }
        echo "<br />";
        
     }
       
    }
    echo "<br />";
}


?>
</body>
</html>