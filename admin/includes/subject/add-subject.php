 <!--ADD SUBJECT FORM-->
<div class="col-xs-6" id="addsubject">
    <?php 
        addSubject();
    ?>
    <h3>Add Subject</h3>
    
    <div id="messages"></div>
    
    <form action="" method="post">
        <label for="subject_name">Subject Name<span class="text-danger"> &#42;</span></label>
        <div class="form-group">
            <input type="text" class="form-control" id="subject_name" name="subject_name"> </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submitsubject" value="Add Subject"> </div>
    </form>
</div>
<!--END OF ADD SUBJECT-->