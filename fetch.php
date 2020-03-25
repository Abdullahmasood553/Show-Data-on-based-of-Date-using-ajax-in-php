<?php 
    $connection = mysqli_connect("localhost", "root", "", "php_validation");
    $return_arr = array();

    $query = "SELECT * FROM users";
    
    $result = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_array($result)){
        $id              = $row['id'];
        $fname           = $row['fname'];
        $lname           = $row['lname'];
        $email           = $row['email'];
    
        $return_arr[] = array("id" => $id,
                        "fname" => $fname,
                        "lname" => $lname,
                        "email" => $email);
    }
    
    // Encoding array in JSON format
    echo json_encode($return_arr);

    
?>


