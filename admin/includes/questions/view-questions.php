    <!-- INSERTED QUESTIONS -->
    <div class="col-xs-12 table-responsive">
       <h3>Questions</h3>
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Subject</th>
                <th>Chapter</th>
                <th>Question Marks</th>
                <th></th>
                <th></th>

            </tr>
            <tbody>
                <?php
                        $query = "SELECT * FROM questions";
                        $select_all_questions_query = mysqli_query($connection, $query);
                        editQuestion();
                        while($row = mysqli_fetch_assoc($select_all_questions_query)) {
                                echo "<tr>";
                                $question_id = $row['question_id'];
                                $question = $row['question'];
                                $question_chapter_id = $row['question_chapter_id'];

                                $chapter_name_query = "SELECT * FROM chapter, subjects WHERE chapter.chapter_id = $question_chapter_id AND chapter.chapter_subject_id = subjects.subject_id";
                                $chapter_name_select_query = mysqli_query($connection, $chapter_name_query);
                                if($row_chapter = mysqli_fetch_assoc($chapter_name_select_query) ) {
                                    $question_chapter_name = $row_chapter['chapter_name'];
                                    $question_subject_name = $row_chapter['subject_name'];
                                }

                                $question_marks = $row['question_marks'];
                                echo "<td>$question_id</td>";
                                echo "<td>$question</td>";
                                echo "<td>$question_subject_name</td>";
                                echo "<td>$question_chapter_name</td>";
                                echo "<td>$question_marks</td>";
                                echo "<td><a href = 'questions.php?delete=$question_id' class = 'btn btn-danger'><span class = 'fa fa-times'></span> Delete</a></td>";
                                echo "<td><button type='button' class = 'btn btn-primary edit_btn' id = '' data-target='#addquestion' data-toggle='modal' data-question-id = '$question_id' data-chapter-name = '$question_chapter_name' data-question-id = '$question_chapter_id' data-subject = '$question_subject_name'><span class = 'fa fa-times'></span> Edit</button></td>";
                                echo "</tr>";
                        }

                        if( isset($_GET['delete'] ) ) {
                            $delete_id = $_GET['delete'];
                            $query = "DELETE FROM questions WHERE question_id = $delete_id";
                            $delete_query = mysqli_query($connection, $query);
                            header("Location: questions.php");                                                
                        }                        
            ?>
            </tbody>
        </table>
    </div>
    <!-- END OF INSERTED QUESTIONS -->