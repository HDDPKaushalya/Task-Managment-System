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

    $Tid = $_POST["Tid"];
    $Name = $_POST["Name"];
    $Sdate= $_POST["Sdate"];
    $Edate = $_POST["Edate"];
    $nature = $_POST["nature"];

    
    $sql = "INSERT INTO  task(Tid, Name, Startdate,enddate, nature) VALUES ('$Tid','$Name','$Sdate','$Edate','$nature')";

    if (mysqli_query($conn, $sql)){
        echo "New record has been added successfully.";
    }
    else{
        echo "Error: ".$sql."<br>". mysqli_error($conn);
    }

    mysqli_close($conn);


?>