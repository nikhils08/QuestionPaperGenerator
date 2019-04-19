			<div id = "pdf-to-save">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Question No.</th>
                        <th>Question</th>
                        <th>Marks</th>
                    </tr>
                    <tbody>
                
                    <?php 
                        
                        if( isset( $_POST['btn_generatesubject'] ) || isset( $_POST['btn_generatechapter'] )) {

                            //set_time_limit(4);

                            //echo "Button Pressed";
                            if(isset( $_POST['btn_generatesubject'] ) ){
                            
                                $subject_selected = $_POST['subject_selection'];
                                $total_marks = $_POST['totalmarks_subject'];
                            //echo $subject_selected;

                                $query = "SELECT * FROM questions, chapter, subjects WHERE questions.question_chapter_id = chapter.chapter_id AND chapter.chapter_subject_id = subjects.subject_id AND subjects.subject_id = $subject_selected ORDER BY questions.question_marks ASC";
                            
                            } else if( isset( $_POST['btn_generatechapter'] ) ) {
                                $chapter_selected = $_POST['chapter_name'];
                                $total_marks = $_POST['total_marks_chapter'];
                                $query = "SELECT * FROM questions WHERE question_chapter_id = $chapter_selected ORDER BY question_marks ASC";
                            }
                            
                            $get_questions_query = mysqli_query($connection, $query);
                            confirmQuery($get_questions_query);

                            $question_ids = array();
                            $questions = array();
                            $each_question_mark = array();
                            $total_questions_marks = 0;
                            $i = 0;
							$subject_name = "";
                            while($row = mysqli_fetch_assoc($get_questions_query) ) {

                                $question_id = $row['question_id'];
                                $question_ids[$i] = $question_id;

                                $question = $row['question'];
                                $questions[$i] = $question;

                                $per_question_marks = $row['question_marks'];
                                $each_question_mark[$i] = $per_question_marks;

                                $total_questions_marks = $total_questions_marks + $per_question_marks;

								$subject_name = $row['subject_name'];
								
                                $i++;
								
                            }
							
                           $length = count($question_ids);

                            /*echo "IDs and Questions and Marks Are<br>";
                            for($i = 0; $i < $length; $i++){
                                echo $question_ids[$i] . " ";
                                echo $questions[$i] . " ";
                                echo $each_question_mark[$i] . "<br>";
                            }*/
                            //echo "Total Marks are " . $total_questions_marks . "<br>";

                            generatePaper($questions, $each_question_mark, $total_marks, $length);         
                            //header("Location: generator.php?yes=1");
                        }
                    ?>
                    </tbody>
                </table>
			</div>
			<div class="form-group">
                	<button type='button' class='btn btn-primary' id="btntoprint" onclick="createPDF('<?php echo $subject_name; ?>', <?php echo $total_marks; ?>)"> <span class='fa fa-fw fa-pencil'></span> Save Paper </button> 
                </div>
			
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/scripts.js"></script>

	<script>

	function createPDF(subject_name, total_marks) {
        var sTable = document.getElementById('pdf-to-save').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 20px Calibri;}";
        style = style + "table, th, td {border: solid 1px #ccc; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=1080,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Subject - ' + subject_name + ' Total Marks - ' + total_marks + '</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
	</script>
