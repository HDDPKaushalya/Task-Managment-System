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

    $Eid = $_POST["Eid"];
    $telephone = $_POST["telephone"];
    $Name = $_POST["Name"];
    $email = $_POST["email"];
    $Designation = $_POST["Designation"];
    $Pass = "1234";
    $Type = "Other Employees";

    
    $sql = "INSERT INTO Employee (Eid, telephone, Name, email, Designation) VALUES ('$Eid','$telephone','$Name','$email','$Designation')";
    $sql20 = "INSERT INTO signup(usname,Telp,Name,Email,Des,Pass,type)
                    VALUES('$Eid','$telephone','$Name','$email','$Designation','$Pass','$Type')";
    mysqli_query($conn,$sql20);
    if (mysqli_query($conn, $sql)){
        echo "New record has been added successfully.";
    }
    else{
        echo "Error: ".$sql."<br>". mysqli_error($conn);
    }

    mysqli_close($conn);


?>
