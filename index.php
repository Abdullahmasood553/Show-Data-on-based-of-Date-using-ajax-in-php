<?php  
    $connect = mysqli_connect("localhost", "root", "", "php_validation");  
    $query = "SELECT * FROM users ORDER BY id";   
    $result = mysqli_query($connect, $query);     
 ?>  

<!DOCTYPE html>  
 <html>  
      <head>  
            <title>ABNATION</title>  
            <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
      </head>  
      <body>  
        
           <div class="container">  
            <h2 class="bg-dark text-white text-center p-4">User Listing</h2>
               
                <div class="col-md-3">  
                     <input type="text" name="date_picker" id="date_picker" class="form-control" placeholder="Select Date" />  
                </div>  

                <br>    
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-dark">  
                </div> 

                <div style="clear:both"></div>                 
                <br />  
                <div id="get_data">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th>ID</th>  
                               <th>First Name</th>  
                               <th>Last Name</th>  
                               <th>Email</th>  
                               <th>Date</th>  
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["id"]; ?></td>  
                               <td><?php echo $row["fname"]; ?></td>  
                               <td><?php echo $row["lname"]; ?></td>  
                               <td><?php echo $row["email"]; ?></td>  
                               <td><?php echo $row["date"]; ?></td>  
                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>
           
     <script src="http://code.jquery.com/jquery-3.4.1.js"></script>     
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>           
     <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" ></script>
     <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    
    <script>  
      $(document).ready(function(){  
          
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  

           $("#date_picker").datepicker();
          
           $('#filter').click(function(){  
            var date_picker = $('#date_picker').val();            
                if(date_picker != '' )  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{date_picker:date_picker},  
                          success:function(data)  
                          {  
                               $('#get_data').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
        </script>
      </body>  
 </html>  
 