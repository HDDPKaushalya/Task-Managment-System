<html>
    <head> <title> Register tasks </title>
    <link rel="stylesheet" href="stylefill.css">
    
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


$conn = mysqli_connect($servername,$username,$password,$dbname);



?>

<div class="ap">
    <h1>Assign Activities</h1>
<table>
<form method="POST" action="Activity.php" >
        <tr>
            <td>
                <label for="taskid">Task ID</label>
            </td>
            <td>
                <select name="taskid" id="taskid" required>
                    <option value=""></option>
                   <?php 
                    $categoris = mysqli_query($conn, "SELECT * FROM task");
                    while ($row = mysqli_fetch_array($categoris)){
                   ?> 
                   <option value="<?php echo $row['Tid']?>"><?php echo $row['Tid'] ?> </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="act">Activity Id</label>
            </td>
            <td>
                <input type="text" id="actid" name="actid">
            </td>
        </tr>
        <tr>
            <td>
                <label for="act">Activity</label>
            </td>
            <td>
                <input type="text" id="act" name="act">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" id="submit" name="submit" value="Add" required>
            </td>
        </tr>

        

    </form>

    

</table>

<?php 
error_reporting(0);
global $act;
global $taskid;
global $actid;
$taskid = $_POST['taskid'];
$act = $_POST['act'];
$actid = $_POST['actid'];

if (isset($_POST['submit'])) { 
    if(array_key_exists('submit', $_POST)) { 
        $sql = "INSERT INTO taskactivities(activityid,Tid,activity)
            VALUES('$actid','$taskid', '$act')";
        mysqli_query($conn,$sql);
        

    } 
} 



?>


<?php

$query = "SELECT * FROM  taskactivities";
$result = mysqli_query($conn,$query);
?>

<table class ="table1">
    <tr>
        
        <th>
            Tid
        </th>
        <th>
            Activity Id
        </th>
        <th>
            Activity
        </th>
    
    </tr>
<?php


if( mysqli_num_rows($result)>0 ){
    while($data = mysqli_fetch_assoc($result)){ 
      ?>
        <tr>
            
            <td><?php echo $data['activityid']; ?> </td>
            <td><?php echo $data['Tid']; ?> </td>
            <td><?php echo $data['activity'];?> </td>

        </tr>
      <?php
    }
}else{ ?>
    <tr>
    <td colspan="5">No data found</td>
    </tr>
<?php
}

 ?>
</table>


<form method="POST">
    <input type="submit" name="sub" id="sub">
</form>
<form method="POST">
    <input type="submit" name="cleen" id="cleen" value="Cleen">
</form>
<a href="HomePage.html" class="button">Home Page</a>


<?php
if (isset($_POST['cleen'])) { 
    $query = "DELETE FROM temp;";
    $result = mysqli_query($conn,$query);
} 

mysqli_close($conn);
?>

</div>
</body>

</html>