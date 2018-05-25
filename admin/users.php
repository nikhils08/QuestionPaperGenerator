<?php 
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    $page = "users";
    $title = "Users || QUESTION PAPER"; 
    include_once("includes/header.php");
    include_once("functions.php");
?>

<body>
    <div id="wrapper">
        <!--NAVIGATION-->
        <?php 
            include_once("includes/navigation.php");
        ?>
        <!---END OF NAVIGATION-->
        <!-- START OF PAGE WRAPPER -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            include_once("includes/page-heading.php");
                        ?>
                        
<?php 
    $source = "";
    if( isset( $_GET['source'] ) ){
        $source = $_GET['source'];
    }
    switch($source){
        
        case 'add_user':
            include_once("includes/users/add-user.php");
            break;
            
        case 'edit_user':
            include_once("includes/users/edit-user.php");
            break;
        
        default: 
            include_once("includes/users/view-all-users.php");
            break;
    }
?>
                        
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
