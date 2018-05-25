    <?php

        if( isset( $_GET['edit_id'] ) ) {
            $edit_user_id = $_GET['edit_id'];
            $query = "SELECT * FROM users WHERE user_id = $edit_user_id";
            $edit_user_query = mysqli_query($connection, $query);
            confirmQuery($edit_user_query);
            if( $row = mysqli_fetch_assoc($edit_user_query) ){
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];
                $user_image = $row['user_image'];
            }
        }
        if( isset( $_POST['btn_edit_user'] ) ) {

            if( isset( $_GET['edit_id'] ) ) { 

                $username = $_POST['username'];
                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];
                $user_role = $_POST['user_role'];
                $user_email = $_POST['user_email'];

                $user_image = $_FILES['user_image']['name'];
                $user_image_temp = $_FILES['user_image']['tmp_name'];

                if($user_image == ""){
                    $query = "SELECT * FROM users WHERE user_id = $user_id";
                    $user_image_query = mysqli_query($connection, $query);
                    confirmQuery($user_image_query);
                    if($row = mysqli_fetch_assoc($user_image_query) ) {
                        $user_image = $row['user_image'];
                    }
                }

                if($username && $user_email){
                    move_uploaded_file($user_image_temp, "images/users/$user_image");

                    $query = "UPDATE users SET ";
                    $query .= "username = '$username', ";
                    $query .= "user_firstname = '$user_firstname', ";
                    $query .= "user_lastname = '$user_lastname', ";
                    $query .= "user_image = '$user_image', ";
                    $query .= "user_email = '$user_email', ";
                    $query .= "user_role = '$user_role' ";
                    $query .= "WHERE user_id = $user_id";
                    
                    $update_user_query = mysqli_query($connection, $query);
                    confirmQuery($update_user_query);
                }
                else{
                    echo "<h2> Some Fields Were Empty</h2>";
                }
            }
        }
    ?>

   <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" id="user_firstname" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" id="user_lastname" name="user_lastname"  value="<?php echo $user_lastname; ?>">
    </div>
    
    <div class="form-group">
        <label for="user_email">User Email</label>
        <input type="email" class="form-control" id="user_email" name="user_email"  value="<?php echo $user_email; ?>">
    </div>    

    <div class="form-group">
        <label for="user_role">Role</label>
        <select name="user_role" id="user_role" class="form-control">
                <option value="admin" <?php if($user_role == 'admin') echo "selected"; ?>>Admin</option>
                <option value="superadmin" <?php if($user_role == 'superadmin') echo "selected"; ?>>Super Admin</option>
            </select>
    </div>

    <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" class="form-control" id="username" name="username"  value="<?php echo $username; ?>">
    </div>

    <div class="form-group">
        <label>Current User Image</label>
        <img src="images/users/<?php echo $user_image; ?>" alt="User Image" class="img-responsive" width = "200px">
    </div> 
   
    <div class="form-group">
        <label for="user_image">New User Image</label>
        <input type="file" class="form-control" id="user_image" name="user_image">
    </div>    

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="btn_edit_user" value="Edit User">
    </div>    
    
</form>
