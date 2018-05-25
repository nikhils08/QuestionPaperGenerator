<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login || Question Paper Generator</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="login">

    <?php 
        if(isset($_GET['loginfailed'])){
             //die ("<h3 style = 'color: red;' class='text-center'> Login Failed Please Retry From <a href = 'index.php'>here</h3>");
            header("refresh: 2, url=index.php");
            die("<h3 style = 'color: red;' class='text-center'> Login Failed Redirecting You To Login Please Wait&#33; &#40; Please Do Not Refresh &#41;</h3>");
        }
    ?>
    
    <div class="container">

        <div class="row">
    
           <div class="col-md-6 col-md-offset-3 my-login">
           <form action="includes/login.php" method="POST" role="form">
                <legend><h2>Login</h2></legend>
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your UserName">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                </div>

                <button type="submit" class="btn btn-success" name="login" id="login_btn"><span class="glyphicon glyphicon-ok-sign"></span> Login</button>
            </form>

           </div>
       
        </div>
        <!-- /.row -->

        <hr>
       
    </div>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
