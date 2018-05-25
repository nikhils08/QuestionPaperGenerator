    <!-- INSERTED CHAPTERS -->
    <div class="col-xs-12 table-responsive">
       <h3>Questions</h3>
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Chapter</th>
                <th></th>
                <th></th>
            </tr>
            <tbody>
                <?php
                        $query = "SELECT * FROM chapter, subjects WHERE chapter.chapter_subject_id = subjects.subject_id ORDER BY subjects.subject_name ASC";
                        $select_all_chapters_query = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_all_chapters_query)) {
                                echo "<tr>";
                                $chapter_id = $row['chapter_id'];
                                $chapter_name = $row['chapter_name'];
                                $chapter_subject_id = $row['chapter_subject_id'];
                                $chapter_subject_name = $row['subject_name'];

                                echo "<td>$chapter_id</td>";
                                echo "<td>$chapter_subject_name</td>";
                                echo "<td>$chapter_name</td>";
                                echo "<td><a href = 'chapters.php?delete=$chapter_id' class = 'btn btn-danger'><span class = 'fa fa-times'></span> Delete</a></td>";
                                echo "<td><a href='chapters.php?edit=$chapter_id' class='btn btn-primary'><span class='fa fa-pencil'></span> Edit</a></td> ";
                                echo "</tr>";
                        }

                        if( isset($_GET['delete'] ) ) {
                            $delete_id = $_GET['delete'];
                            $query = "DELETE FROM chapter WHERE chapter_id = $delete_id";
                            $delete_query = mysqli_query($connection, $query);
                            header("Location: chapters.php");                                                
                        }
            ?>
            </tbody>
        </table>
    </div>
    <!-- END OF INSERTED CHAPTERS -->