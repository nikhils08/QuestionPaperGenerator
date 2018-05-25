<?php 
    if( isset( $_POST['create_user'] ) ) {
        
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_confirm_password = $_POST['user_confirm_password'];
        
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        
        if($user_password === $user_confirm_password){
            
            if($username && $user_email && $user_password) {
                
                move_uploaded_file($user_image_temp, "images/users/$user_image");

                $options = [
                    'cost' => 10,
                    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),            
                ];

                $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, $options);
                
                $query = "INSERT INTO users(username, user_firstname, user_lastname, user_role, user_password, user_image, user_email) VALUES ('$username', '$user_firstname', '$user_lastname', '$user_role', '$hashed_password', '$user_image', '$user_email')";

                $create_post_query = mysqli_query($connection, $query);

                confirmQuery($create_post_query);
            }
            else
                echo "<h2>Username Or Email Or Password Cannot Be Empty</h2>";    
        }
        else{
            echo "<h2>Passwords Does Not Match</h2>";
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" id="user_firstname" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" id="user_lastname" name="user_lastname">
    </div>
    
    <div class="form-group">
        <label for="user_email">User Email</label>
        <input type="email" class="form-control" id="user_email" name="user_email">
    </div>    

    <div class="form-group">
        <label for="user_role">Role</label>
        <select name="user_role" id="user_role" class="form-control">
                <option value="admin">Admin</option>
                <option value="superadmin">Super Admin</option>
            </select>
    </div>

    <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" id="user_password" name="user_password">
    </div>

    <div class="form-group">
        <label for="user_confirm_password">Confirm Password</label>
        <input type="password" class="form-control" id="user_confirm_password" name="user_confirm_password">
    </div>    

    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" class="form-control" id="user_image" name="user_image">
    </div>    

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Sign Up">
    </div>    
    
</form>