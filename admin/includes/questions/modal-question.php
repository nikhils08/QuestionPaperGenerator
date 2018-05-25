<!--MODAL -->
<form class="modal fade" id="addquestion" data-backdrop="static" action="" method="post">
    <div class="modal-dialog modal-lg">
        <!--MODAL CONTENT-->
        <div class="modal-content">
           <!--MODAL HEADER-->
            <div class="modal-header">
<!--                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>-->
                <h4 class="modal-title" id="modaltitle"> Add Question </h4>
            </div>

            <!--END OF MODAL HEADER -->
            <!--MODAL BODY-->
            <div class="modal-body">
                <div id="messages"></div>
                   <!--<label for="question" id="question_id_lbl">Question ID<span class="text-danger"> &#42;</span></label>-->
                    <div class="form-group" hidden="true">  
                        <input type="text" class="form-control" id="question_id" name="question_id"> 
                    </div>
                   
                    <label for="question">New Question<span class="text-danger"> &#42;</span></label>
                    <div class="form-group">  
                        <input type="text" class="form-control" id="question" name="question"> 
                    </div>

                    <label for="subject">Select Subject <span class="text-danger"> &#42;</span><span id="selectedsubject" name = "selectedsubject" style="font-size: 16px;"> Old Subject&#58;&#45; </span></label>
                    <div class="form-group">
                        <select name="subject" class="form-control" id="subject">
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

                    <label for="chapter">Select Chapter <span class="text-danger"> &#42;</span><span id="selectedchapter" name = "selectedchapter" style="font-size: 16px;"> Old Chapter&#58;&#45; </span></label>
                    <div class="form-group">
                        <select name="chapter" class="form-control" id="chapter">
                            <?php 
                               echo "<option value = ''> Select Chapter </option>";
                            ?>
                        </select>
                    </div>
                    <label for="question_marks">Question Marks<span class="text-danger"> &#42;</span> <span class = "text-warning"></span> </label>
                    <div class="form-group">  
                        <input type ="number" class="form-control" id="question_marks" name="question_marks" min="1" max="20" placeholder="Minimum 1"> 
                    </div>   
            </div>
            <!--END OF MODAL BODY -->
            <!--MODAL FOOTER-->
            <div class="modal-footer">
                <button class="btn btn-warning" id = "btncancel" data-target = "#addquestion" data-toggle = "modal"><span class="fa fa-times"></span> Cancel</button> 
                <button type="submit" class="btn btn-success" name="btntoadd" id = "btntoperform"><span class="fa fa-check"></span> Add Question</button>
            </div>
            <!--END OF MODAL-FOOTER -->
        </div>
        <!--END OF MODAL CONTENT -->
    </div>
    <!-- END OF MODAL DIALOG -->
</form>
<!--class modal -->
<!--END OF MODAL-->