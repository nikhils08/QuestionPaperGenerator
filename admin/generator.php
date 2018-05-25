<?php 
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php 
    $title = "Generator || QUESTION PAPER";
    include_once("includes/header.php");
?>

<body>

    <div id="wrapper">
        
        <!--NAVIGATION BAR-->
        <?php 
            include_once("includes/navigation.php");
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                 <?php 
                    include_once("includes/page-heading.php");
                ?>    
                <!-- /.row -->
                
                
                <?php 
                if(isset($_POST['btn_generatesubject']) || isset($_POST['btn_generatechapter'])){
                    include_once("newpaper.php");
                }
                else{
                    include_once("includes/generator/generatesubject.php");
                    include_once("includes/generator/generatechapter.php");
                }
                ?>
                
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
    
    <script src="js/bootstrapvalidator.min.js"></script>
    
    <script src="js/scripts.js"></script>

</body>

</html>
