<?php 
    
    $connect =  mysqli_connect('localhost', 'root', '', 'php_validation');
    // Messages Vars
    $msg = '';
    $msgClass = '';

    $fname       = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname       = isset($_POST['lname']) ? $_POST['lname'] : '';
    $email       = isset($_POST['email']) ? $_POST['email'] : '';
    $password    = isset($_POST['password']) ? $_POST['password'] : '';


    $sql = "INSERT INTO users(fname, lname, email, `password`) VALUES('$fname', '$lname', '$email', '$password')";

    if(mysqli_query($connect, $sql)) {
        echo 'Data inseterd';
    } else {
        // echo 'Error: '.mysqli_error($connect);
        $msg = 'Data Not inserted';
        $msgClass = 'alert alert-danger';
    }

?>