
<div class="col-lg-12" id="addchapter">
   
   
    <h3>Add New Chapter</h3>
    
        <div id="messages"></div> 
    
    <div class="form-container">
        <form action="" method="post"> 

           <div class="col-xs-4">
               <label for="chap_subject">Select Subject<span class="text-danger"> &#42;</span></label>
               <div class="form-group">
                    <select name="chap_subject" class="form-control" id="chap_subject">
                        <option value="">Select Subject</option>
                        <?php 
                            $query = "SELECT * FROM subjects";
                            $select_all_subjects_query = mysqli_query($connection, $query);
                            confirmQuery($select_all_subjects_query);
                            while($row = mysqli_fetch_assoc($select_all_subjects_query)) 
                            {
                                $subject_id = $row['subject_id'];
                                $subject_name = $row['subject_name'];
                                echo "<option value = '$subject_id' > $subject_name </option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-4">
                <label for="chap_name">Chapter Name<span class="text-danger"> &#42;</span></label>
                <div class="form-group">  
                    <input type="text" class="form-control" id="chap_name" name="chap_name"> 
                </div>
           </div>
           <div class="col-xs-4">
                <div class="form-group">
                    <button type="submit" id = "btnform" class="btn btn-success" name="btnform"><span class="fa fa-pencil"></span> Add Chapter</button>
                </div>    
            </div>
        </form>
    </div> 
</div>
<?php 
    if(isset($_POST['btnform'])){
        $chapter_subject = $_POST['chap_subject'];
        $chapter_name = $_POST['chap_name'];
        
        //echo $chapter_subject . " " . $chapter_name;
        
        if(empty($chapter_subject) || empty($chapter_name)){
            echo "<h5 class = 'text-danger'>&#42;Some Values Missing Please try again</h5>";
        } else{
            $query = "INSERT INTO chapter(chapter_subject_id, chapter_name) VALUES ($chapter_subject, '$chapter_name')";
             $insert_chap_query = mysqli_query($connection, $query);
            confirmQuery($insert_chap_query);
            header("Location: chapters.php");
        }
    }
?>