<?php 
    
    $connect =  mysqli_connect('localhost', 'root', '', 'php_validation');

    $fname       = ($_POST['fname']) ? $_POST['fname'] : '';
    $lname       = ($_POST['lname']) ? $_POST['lname'] : '';
    $email       = ($_POST['email']) ? $_POST['email'] : '';
    $password    = ($_POST['password']) ? $_POST['password'] : '';
    $date        = ($_POST['date']) ? $_POST['date'] : '';
    
    $sql = "INSERT INTO users(fname, lname, email, `password`, `date`) VALUES('$fname', '$lname', '$email', '$password', '$date')";

    if(mysqli_query($connect, $sql)) {
        echo 'Data inseterd';
    } else {
         echo 'Error: '.mysqli_error($connect);
    }
?>


