
    <!-- INSERTED CATEGPORIES -->
    <div class="col-xs-12">
       <h3>Categories</h3>
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Subject Name</th>
                <th></th>
                <th></th>
            </tr>
            <tbody>
                <?php
                        $query = "SELECT * FROM subjects";
                        $select_all_subjects_query = mysqli_query($connection, $query);
                        confirmQuery($select_all_subjects_query);
                        while($row = mysqli_fetch_assoc($select_all_subjects_query)) {
                                echo "<tr>";
                                $subject_id = $row['subject_id'];
                                $subject_name = $row['subject_name'];
                                echo "<td>$subject_id</td>";
                                echo "<td>$subject_name</td>";
                                echo "<td><a href='subjects.php?delete=$subject_id' class='btn btn-danger'><span class='fa fa-times'></span> Delete</a></td>";
                                echo "<td><a href='subjects.php?edit=$subject_id' class='btn btn-primary'><span class='fa fa-pencil'></span> Edit</a></td>";
                                echo "</tr>";
                        }

                        if( isset($_GET['delete'] ) ) {
                            $delete_id = $_GET['delete'];
                            $query = "DELETE FROM subjects WHERE subject_id = $delete_id";
                            $delete_query = mysqli_query($connection, $query);
                            header("Location: subjects.php");                                                
                        }
            ?>
            </tbody>
        </table>
    </div>
    <!--END OF INSERTED CATEGORIES-->