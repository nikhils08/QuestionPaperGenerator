<?php 
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php 
    $page = "subjects";
    $title = "Subjects || QUESTION PAPER";
    include_once("includes/header.php");
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
                        <?php include_once("includes/subject/add-subject.php");?>
                        <?php include_once("includes/subject/edit-subject.php");?>
                        <?php include_once("includes/subject/view-subject.php");?>
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
    
    <script src="js/bootstrapvalidator.min.js"></script>
    
    <script src="js/scripts.js"></script>
    
</body>

</html>
