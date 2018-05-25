<!--EDIT CHAPTER FORM-->
<div class="col-lg-12" id="editchapter">
    <?php
    
        if( isset($_POST['edit_btnform'] ) ) {
            $chap_id = $_GET['edit'];
            $chap_name = $_POST['edit_chap_name'];
            $chap_subject_id = $_POST['edit_chap_subject'];
            
            if(empty($chap_subject_id) || empty($chap_name) ) {
                echo "<h5 class = 'text-danger'>&#42;Some Values Missing Please try again</h5>";
            } else{
                $query = "UPDATE chapter SET chapter_subject_id = $chap_subject_id, chapter_name = '$chap_name' WHERE chapter_id = $chap_id";
                $edit_chap_data_query = mysqli_query($connection, $query);
                confirmQuery($edit_chap_data_query);
                header("Location: chapters.php");
            }
        }
    
    
    
        if( isset($_GET['edit'] ) ) {
            $edit_chap_id = $_GET['edit'];                
            $query = "SELECT * FROM chapter WHERE chapter_id = $edit_chap_id";
            $get_data_query = mysqli_query($connection, $query);
            confirmQuery($get_data_query);
            if($row = mysqli_fetch_assoc($get_data_query)){
                $previous_chapter_name = $row['chapter_name'];
                $previous_chapter_subject = $row['chapter_subject_id'];
            }
        }
    ?>
    <?php if(isset($edit_chap_id))
            {   
    ?>
    
    <h3>Edit Chapter</h3>
    <div class="messages"></div> 
    <div class="form-container">
        <form action="" method="post">

           <div class="col-xs-4">
               <label for="edit_chap_subject">Select Subject<span class="text-danger"> &#42;</span></label>
               <div class="form-group">
                    <select name="edit_chap_subject" class="form-control" id="edit_chap_subject">
                        <option value="">Select Subject</option>
                        <?php 
                            $query = "SELECT * FROM subjects";
                            $select_all_subjects_query = mysqli_query($connection, $query);
                            confirmQuery($select_all_subjects_query);
                            while($row = mysqli_fetch_assoc($select_all_subjects_query)) 
                            {
                                $subject_id = $row['subject_id'];
                                $subject_name = $row['subject_name'];
                                
                                if($subject_id == $previous_chapter_subject)
                                    echo "<option value = '$subject_id' selected> $subject_name </option>";
                                else
                                    echo "<option value = '$subject_id' > $subject_name </option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-4">
                <label for="edit_chap_name">Chapter Name<span class="text-danger"> &#42;</span></label>
                <div class="form-group">  
                    <input type="text" class="form-control" id="edit_chap_name" name="edit_chap_name" value="<?php echo $previous_chapter_name; ?>"> 
                </div>
           </div>
           <div class="col-xs-4">
                <div class="form-group">
                    <button type="submit" id = "edit_btnform" class="btn btn-success" name="edit_btnform"><span class="fa fa-pencil"></span> Edit Chapter</button>
                </div>    
            </div>
        </form>
    </div> 
    
    
    
    <?php 
            }
    ?>
</div>
<!--END OF EDIT CHAPTER-->