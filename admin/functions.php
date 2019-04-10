<?php 

if( isset( $_GET['getchapters'] ) ) {
    $subject_id = $_GET['subject_id'];
    include_once("../includes/db.php");
    getChapters($subject_id);
}

if( isset( $_GET['edit_data'] ) ) {
    $question_id = $_GET['ques_id'];
    include_once("../includes/db.php");
    fetchDataToEdit($question_id);
}

function fetchDataToEdit($question_id){
    global $connection;
    $query = "SELECT * FROM questions WHERE question_id = $question_id";
    $select_question = mysqli_query($connection, $query);
    confirmQuery($select_question);
    if($row = mysqli_fetch_assoc($select_question)){
        $question = $row['question'];
        $question_marks = $row['question_marks'];
        echo "<marks=" . $question_marks . "ques=" . $question  . ">";
    }
}

function getChapters($subject_id){
    global $connection;
    $query = "SELECT * FROM chapter WHERE chapter_subject_id = $subject_id";
    $select_chapters_query = mysqli_query($connection, $query);
    confirmQuery($select_chapters_query);
    $chapter_names = "";
    while($row = mysqli_fetch_assoc($select_chapters_query)){
        $chapter_name = $row['chapter_name'];
        $chapter_id = $row['chapter_id'];
        $chapter_names = $chapter_names . "<ID" . $chapter_id . "NAME-%#" . $chapter_name . "#%>";
    }
    echo $chapter_names;
}

function confirmQuery($result) {
    global $connection;
    if(!$result) {
            die("Query Failed : " . mysqli_error( $connection ) );
    }
} 

function checkUser(){
    if(!isset($_SESSION['user_id'] ) ) {
			return 1;
            die ("<h3 style = 'color: red'> You have not logged in please Login from <a href = '../index.php'>here</h3>");
    }else{
            $user_id = $_SESSION['user_id'];
            return $user_id;
	}
}

function editQuestion(){
    global $connection;

    if( isset($_POST['btntoedit'] ) ) {
        
        $edit_question = $_POST['question'];
        $edit_question_marks = $_POST['question_marks'];
        $edit_question_id = $_POST['question_id'];
        $edit_chapter_id = $_POST['chapter'];

        //echo "$edit_question, $edit_question_marks, $edit_question_id, $edit_chapter_id";
        
        if(empty($edit_question) || empty($edit_question_marks)){
             echo "<h5 class = 'text-danger'>&#42;Some Values Missing Please try again</h5>";
        } else{
            if(empty($edit_chapter_id)){
                $query = "UPDATE questions SET question = '$edit_question', question_marks = $edit_question_marks WHERE question_id = $edit_question_id";
            } else{
                $query = "UPDATE questions SET question = '$edit_question', question_chapter_id = $edit_chapter_id, question_marks = $edit_question_marks WHERE question_id = $edit_question_id";
            }
            $edit_ques_query = mysqli_query($connection, $query);
            confirmQuery($edit_ques_query);
            header("Location: questions.php");
        }
    }
}

function addQuestion(){
    global $connection;
    
    if( isset($_POST['btntoadd'] ) ) {
        $input_question = $_POST['question'];
        $input_question_subject_id = $_POST['subject'];
        $input_question_chapter_id = $_POST['chapter'];
        $input_question_marks = $_POST['question_marks'];
        if( empty($input_question) || empty($input_question_marks) || empty($input_question_chapter_id) || empty($input_question_subject_id)) {
            echo "<h5 class = 'text-danger'>&#42;Some Values Missing Please try again</h5>";
        }
        else {
            $query = "INSERT INTO questions (question, question_chapter_id, question_marks) VALUES ('$input_question', $input_question_chapter_id, $input_question_marks)";
            $add_question_query = mysqli_query($connection, $query);
            confirmQuery($add_question_query);
            header("Location: questions.php");
        }
    }
}

function addSubject(){
    global $connection;
    
    if( isset($_POST['submitsubject'] ) ) {
        $input_subject_name = $_POST['subject_name'];
        if( $input_subject_name == "" || empty($input_subject_name) ) {
            echo "<h5 class = 'text-danger'>&#42;Please insert subject name and then try</h5>";
        }
        else {
            $query = "INSERT INTO subjects(subject_name) ";
            $query .= "VALUE('$input_subject_name')";
            $add_subject_query = mysqli_query($connection, $query);
            confirmQuery($add_subject_query);
            header("Location: subjects.php");
        }
    }
}

function editSubject(){
    global $connection;
    
    if( isset($_POST['edit_submit'] ) ) {
        $input_subject_name = $_POST['edit_subject_name'];
        $input_subject_id = $_GET['edit'];

        if( $input_subject_name == "" || empty($input_subject_name) ) {
            echo "<h5 class = 'text-danger'>&#42;Please insert Subject Name and then try</h5>";
        }

        else {
            $query = "UPDATE subjects SET subject_name = '$input_subject_name' where subject_id = '$input_subject_id'";
            $update_subject_query = mysqli_query($connection, $query);
            confirmQuery($update_subject_query);
            header("Location: subjects.php");
        }
    }
}

function generatePaper($questions, $each_question_mark, $total_required_marks, $length) {
    $paper_marks = 0;
    $i = 0;
    $samenumber = false;
    $random_numbers_generated = array();
    $not_enough_marks = true;
    $new_total = 0;
    $numbers_count = 0;
    $countsamenumber = 0;
    
    while($i < $length) {
        $random_number = mt_rand(0, $length-1);
        $numbers_count = count($random_numbers_generated);

        //echo "numbers_count = $numbers_count<br>";

        for($j = 0; $j < $numbers_count; $j++){
            if($random_numbers_generated[$j] == $random_number) {
                $samenumber = true;
                $countsamenumber++;
                break;
            } else {
                $countsamenumber = 0;
                $samenumber = false;
                continue;
            }
        }

        if($countsamenumber == $length)
            $i = $length;

        if( $samenumber ){ 
           // echo "Same Number Found $random_number<br>";
            continue;
        }
        //echo "Different Number Found $random_number<br>";
        $new_total = $paper_marks + $each_question_mark[$random_number];
        //echo "New Total is $new_total<br>";
        if($new_total > $total_required_marks)
            continue;

        $random_numbers_generated[$i] = $random_number;
        //echo "Inserted<br>";
        $paper_marks = $paper_marks + $each_question_mark[$random_number];
        $i++;

        if($paper_marks == $total_required_marks){
           // echo "Total Marks achieved<br>";
            break;
        }
    }

    if($i == $length && $paper_marks != $total_required_marks) {
        echo "<tr>";
        echo "<td>1</td>";
        echo "<td>Enough Suitable Questions Not Found</td>";
        echo "<td> Maximum Marks Could Be $paper_marks";
        echo "</tr>";
    } else if($paper_marks == $total_required_marks) {
        //echo "Questions Suitable<br>";

        for($i = 0; $i < count($random_numbers_generated); $i++) {
            $random_number = $random_numbers_generated[$i];
            $new_question = $questions[$random_number];
            $new_question_marks = $each_question_mark[$random_number];
            echo "<tr>";
            $j = $i+1;
            echo "<td>$j</td>";
            echo "<td>$new_question</td>";
            echo "<td>$new_question_marks</td>";
            echo "<tr>";
            //echo "Question = $new_question And Marks = $new_question_marks<br>";
        }

    }
    //header("Location: generator.php");
}

function fetchSubjectToEdit(){
    
    global $connection;
    
    if( isset( $_GET['edit'] ) ) {
        $edit_subject_id = $_GET['edit'];
        $query = "SELECT * FROM subjects WHERE subject_id = $edit_subject_id";
        $edit_subject_name_query = mysqli_query($connection, $query);
        if($row = mysqli_fetch_assoc($edit_subject_name_query)){
            $edit_subject_name = $row['subject_name'];
            return $edit_subject_name;
        }
    }   
}

?>