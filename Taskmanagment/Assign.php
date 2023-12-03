<html>
    <head> <title> Register tasks </title>
    
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

<div class="ap">
    <h1>Assign Task</h1>
<table>
<form method="POST" action="Assign.php" >
        <tr>
            <td>
                <label for="Empid">Employee ID</label>
            </td>
            <td>
                <select name="Empid" id="Empid" required>
                    <option value=""></option>
                   <?php 
                    $categoris = mysqli_query($conn, "SELECT * FROM employee");
                    while ($row = mysqli_fetch_array($categoris)){
                   ?> 
                   <option value="<?php echo $row['Eid']?>"><?php echo $row['Eid'] ?> </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="Taskid">Task ID</label>
            </td>
            <td>
                <select name="Taskid" id="Taskid" required>
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
                <label for="actid">Activity ID</label>
            </td>
            <td>
                <select name="actid" id="actid" required>
                    <option value=""></option>
                   <?php 
                    $categoris = mysqli_query($conn, "SELECT * FROM taskactivities");
                    while ($row = mysqli_fetch_array($categoris)){
                   ?> 
                   <option value="<?php echo $row['activityid']?>"><?php echo $row['activityid'] ?> </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="Datas">Date assign</label>
            </td>
            <td>
                <input type="date" id="Datas" name="Datas">
            </td>
        </tr>
        <tr>
            <td>
                <label for="re">Remarks</label>
            </td>
            <td>
                <input type="text" id="re" name="re">
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
global $re;
global $Datas;
global $Empid;
global $Taskid;
global $actid;
$re = $_POST['re'];
$Datas = $_POST['Datas'];
$actid = $_POST['actid'];
$Taskid =$_POST['Taskid'];
$Empid =$_POST['Empid'];


if (isset($_POST['submit'])) { 
    if(array_key_exists('submit', $_POST)) { 
        $sql = "INSERT INTO assign(Eid,Tid,dateassign,activityid,remarks)
            VALUES('$Empid','$Taskid', '$Datas','$actid','$re')";
        mysqli_query($conn,$sql);
        
        

    } 
} 



?>


<?php

$query = "SELECT * FROM  taskactivities";
$result = mysqli_query($conn,$query);
?>

<form method="POST">
    <input type="submit" name="cleen" id="cleen" value="Cleen">
</form>
<a href="HomePage.html" class="button">Home Page</a>


<?php
if (isset($_POST['cleen'])) { 
    $query = "DELETE FROM assign;";
    $result = mysqli_query($conn,$query);
} 

mysqli_close($conn);
?>

</div>
</body>

</html>