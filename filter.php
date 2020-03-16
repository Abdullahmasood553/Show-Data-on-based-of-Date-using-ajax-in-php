<?php 


    if(isset($_POST["date_picker"])) {
    $connection = mysqli_connect("localhost", "root", "", "php_validation");
    $output = ''; 
    $query = "SELECT * FROM users WHERE `date` = '".$_POST["date_picker"]."' ";

    $result = mysqli_query($connection, $query);  
    $output .= '
            <table  class="table table-striped table-bordered mt-4" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date</th>
                </tr>  
            ';
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) { 
                    $output .= '
                    <tr>  
                        <td>'. $row["id"] .'</td>  
                        <td>'. $row["fname"] .'</td>  
                        <td>'. $row["lname"] .'</td>  
                        <td>'. $row["email"] .'</td>  
                        <td>'. $row["date"] .'</td>  
                    </tr>';
               } 
                    }else  
                    {  
                        $output .= '  
                            <tr>  
                                <td colspan="5">No Order Found</td>  
                            </tr>  
                        ';  
                    }  
            $output .= '</table>';  
            echo $output;
        }
?>

