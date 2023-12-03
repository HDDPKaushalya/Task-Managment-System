<?php
    $servername = "localhost";
    $username = "root";
    $password= "";
    $dbname = "project";

    //create connection 
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //echo "passed";

    //check connection
    if(!$conn){
        die ("Connection failed: ". mysqli_connect_error());
    }

    //sql part


    $sql = "INSERT INTO taskactivities(activityid, Tid, activity)
    SELECT (actid,taskid,act) FROM temp";

    if (mysqli_query($conn, $sql)){
        echo "New record has been added successfully.";
    }
    else{
        echo "Error: ".$sql."<br>". mysqli_error($conn);
    }

    mysqli_close($conn);


?>
