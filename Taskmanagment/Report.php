<html>
    <head> <title> Register tasks </title>

<link rel="stylesheet" href="stylefill1.css">
    
        <script>
            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
        </script>

        

    </head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password ="";
$dbname = "project";
global $conn;


$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT employee.Eid,employee.Name FROM employee INNER JOIN  assign ON assign.Eid = employee.Eid";
$sql2 = "SELECT taskactivities.activityid,taskactivities.activity FROM taskactivities  INNER JOIN  assign ON assign.Tid = taskactivities.Tid";
$result = $conn -> query($sql);
$result1 = $conn ->query($sql2);



while ($row = $result->fetch_assoc()) {
    foreach($row as $ind => $val)
    {
        echo "$ind: $val<br/>";
    }
    echo "<br />";
}

while ($row = $result1->fetch_assoc()) {
    foreach($row as $ind => $val)
    {
        echo "$ind:  $val<br/>";
    }
    echo "<br />";
}



?>





 
</body>
</html>
    