<div class="col-xs-12" id="generatechapter">
    <h3>Generate ChapterWise</h3>
    <div class="messages"></div> 
    <div class="form-container">
        <form action="" method="post"> 
            <div class="col-xs-4">
                <label for="chapter_subject">Select Subject<span class="text-danger"> &#42;</span></label>
                <div class="form-group">
                    <select name="chapter_subject" class="form-control" id="chapter_subject">
                        <option value="" selected>Select Subject</option>
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
               <label for="chapter_name">Select Chapter<span class="text-danger"> &#42;</span></label>
                <div class="form-group">
                    <select name="chapter_name" class="form-control" id="chapter_name">
                        <?php 
                           echo "<option value = '' selected> Select Chapter </option>";
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-xs-4">
               <label for="total_marks_chapter">Select Marks<span class="text-danger"> &#42;</span></label>
                <div class="form-group">
                    <select name="total_marks_chapter" id="total_marks_chapter" class="form-control">
                        <option value="">Select Marks</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="80">80</option>
                    </select>
                </div>
            </div>
            
            <div class="col-xs-4">
                <div class="form-group">
                    <button type="submit" id = "btn_generatechapter" class="btn btn-success" name="btn_generatechapter"><span class="fa fa-book"></span> Generate Paper</button>
                </div>    
            </div>
        </form>
    </div> 
</div>