<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyApp | Abnation</title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="text-center">Account Register</h4>
                        </div>
                        <div class="card-body">
                        <span id="error_message" class="text-danger"></span>  
                        <span id="success_message" class="text-success"></span> 
                            <form id="form_reg">
                                <div class="form-group">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" class="form-control"
                                        placeholder="Enter First Name">
                                </div>

                                <div class="form-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" class="form-control"
                                        placeholder="Enter Last Name">
                                </div>


                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Enter Email">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Enter Password">
                                </div>
                                <button type="submit" class="btn btn-dark btn-block" id="save_form">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            var fname       = $('#fname').val();
            var lname       = $('#lname').val();
            var email       = $('#email').val();
            var password    = $('#password').val();
            
            
            $('#form_reg').validate({
                rules: {
                    'fname': {
                        required: true,
                        minlength: 1
                    }, 
                    'lname': {
                        required: true,
                        minlength: 3,
                    },
                    'email': {
                        'required': true,
                        email: true
                    },
                    'password': {
                        required: true,
                        minlength: 8
                    }
                },
                submitHandler: function () {
                    var formData = new FormData(document.getElementById("form_reg"));
                    $.ajax({
                        type: 'POST',
                        url: 'register.php',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if(data) {
                                console.log('Data inserted successfully');
                                $('#success_message').fadeIn().html(data);  
                                setTimeout(function(){  
                                    $('#success_message').fadeOut("Slow");  
                                }, 2000);
                            }
                            
                            if (data) {
                                $('[name="fname"]').val('');
                                $('[name="lname"]').val('');
                                $('[name="email"]').val('');
                                $('[name="password"]').val('');
                            } 
                            else {
                                console.log('Data not inserted');
                                $('#success_message').fadeIn().html(data);  
                                setTimeout(function(){  
                                    $('#error_message').fadeOut("Slow");  
                                }, 2000);
                            }
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
        });
    </script>

</body>
</html>

