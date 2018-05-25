<div class="col-xs-12" id="generatesubject">
    <h3>Generate SubjectWise</h3>
    <div id="messages"></div> 
    <div class="form-container">
        <form action="" method="post"> 
            <div class="col-xs-6">
                <label for="subject_selection">Select Subject<span class="text-danger"> &#42;</span></label>
                <div class="form-group">
                    <select name="subject_selection" class="form-control" id="subject_selection">
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
            
            <div class="col-xs-6">
               <label for="totalmarks_subject">Select Marks<span class="text-danger"> &#42;</span></label>
                <div class="form-group">
                    <select name="totalmarks_subject" id="totalmarks_subject" class="form-control">
                        <option value="">Select Marks</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="80">80</option>
                    </select>
                </div>
            </div>
            
            
            <div class="col-xs-4">
                <div class="form-group">
                    <button type="submit" id = "btn_generatesubject" class="btn btn-success" name="btn_generatesubject"><span class="fa fa-book"></span> Generate Paper</button>
                </div>    
            </div>
        </form>
    </div> 
</div> 


