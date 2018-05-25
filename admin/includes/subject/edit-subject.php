<!--EDIT CATEGORY FORM-->
<div class="col-xs-6" id="editsubject">
    <?php
        editSubject();
        //USED TO FETCH CATEGORY TITLE ACCORDING TO EDIT GET REQUEST
        $edit_subject_name = fetchSubjectToEdit();
    ?>
    <?php if(isset($edit_subject_name))
            {   
    ?>
    <h3>Edit Subject</h3>
    
    <div class = "messages"></div>
    
    <form action="" method="post">
        <label for="edit_subject_name">Subject Name<span class="text-danger"> &#42;</span></label>
        <div class="form-group">
            <input type="text" class="form-control" id="edit_subject_name" name="edit_subject_name" value="<?php echo $edit_subject_name;?>"> </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="edit_submit" value="Edit Subject"> </div>
    </form>
    <?php 
            }
    ?>
</div>
<!--END OF EDIT CATEGORY-->