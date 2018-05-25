<!--VIEW ALL USERS START-->

<div class="col-xs-12 table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Image</th>
            <th>Make Admin</th>
            <th>Make Super Admin</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <tbody>
        <?php
            $query = "SELECT * FROM users";
            $select_all_users_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_all_users_query)) {
                
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_email = $row['user_email'];
                    $user_role = $row['user_role'];
                    $user_image = $row['user_image'];
                
                    echo "<tr>";
                    echo "<td>$user_id</td>";
                    echo "<td>$username</td>";
                    echo "<td>$user_firstname</td>";
                    echo "<td>$user_lastname</td>";
                    echo "<td>$user_email</td>";
                    echo "<td>$user_role</td>";
                    echo "<td><img src='images/users/$user_image' alt = '$username' class = 'img-responsive img-rounded' width = '120px'/></td>";
                
                    echo "<td><a href='users.php?admin=$user_id' class='btn btn-success'><span class='fa  fa-check-square'></span> Make Admin</a></td>";
                    echo "<td><a href='users.php?superadmin=$user_id' class='btn btn-warning'><span class='fa fa-user'></span> Make Super Admin</a></td>";
                    echo "<td><a href='users.php?source=edit_user&edit_id=$user_id' class='btn btn-primary'><span class='fa fa-pencil'></span> Edit</a></td>";
                    echo "<td><a href='users.php?delete=$user_id' class='btn btn-danger'><span class='fa fa-trash'></span> Delete</a></td>";
                    echo "</tr>";
            }

        ?>

        </tbody>
    </table>

    <?php

        if( isset( $_GET['superadmin'] ) ) {
                $make_superadmin_user_id = $_GET['superadmin'];
                $query = "UPDATE users SET user_role  = 'superadmin' WHERE user_id = $make_superadmin_user_id";
                $make_superadmin_query = mysqli_query($connection, $query);
                confirmQuery($make_superadmin_query);
                header('Location: users.php');
        }

        if( isset( $_GET['admin'] ) ) {
                $make_admin_user_id = $_GET['admin'];
                $query = "UPDATE users SET user_role  = 'admin' WHERE user_id = $make_admin_user_id";
                $make_admin_query = mysqli_query($connection, $query);
                confirmQuery($make_admin_query);
                header('Location: users.php');
        }

        if( isset( $_GET['delete'] ) ) {
                $delete_user_id = $_GET['delete'];
                $query = "DELETE FROM users WHERE user_id = $delete_user_id";
                $delete_user_query = mysqli_query($connection, $query);
                confirmQuery($delete_user_query);

                header('Location: users.php');
        }
    
    ?>
    
    
</div>

<!--VIEW ALL USERS END-->