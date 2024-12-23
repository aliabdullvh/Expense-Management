<?php
include("header.php");
include("functions.php");
include("db_conn.php");

$update_pass_id = null;
$db_username = null;

//fetching data from database
if (isset($_REQUEST['update_pass_id'])) {
    $update_pass_id = $_REQUEST['update_pass_id'];
    $fetch_query = "SELECT user_name FROM reg_users WHERE reg_id = $update_pass_id";
    $run_fetch_query = mysqli_query($conn, $fetch_query);

    $row = mysqli_fetch_assoc($run_fetch_query);
    $db_username = $row['user_name'];
}

//Updating user password in database
if (isset($_REQUEST['update_pass'])) {
    $update_user_pass = $_REQUEST['update_user_pass'];
    $enc_password = password_hash($update_user_pass, PASSWORD_BCRYPT);

    $update_query = "UPDATE reg_users SET user_pass = '$enc_password' WHERE reg_id = $update_pass_id";
    $run_update_query = mysqli_query($conn, $update_query);

    if ($run_update_query) {
        my_alert("success", "Password Updated Successfully!");
    } else {
        my_alert("danger", "Error while updating password");
    }
}

mysqli_close($conn);

?>


<div class="container" style="margin-top: 50px;">
    <div class="card myCard" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
        <div class="card-header"
            style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; text-align: center; font-size: 1.5rem; font-weight: bold; padding: 20px;">
            Update Password
        </div>

        <div class="card-body" style="background-color: #f4f4f9; padding: 30px;">
            <div class="row">
                <div class="col-12">
                    <form method="POST" style="font-size: 1.1rem;">

                        <div class="mb-3">
                            <label for="" class="form-label">User Name</label>
                            <input type="text" class="form-control" value="<?php echo $db_username ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter New Password</label>
                            <input type="password" class="form-control" name="update_user_pass" required
                                style="border: 1px solid #ccc; border-radius: 5px;">

                        </div>
                        <div class="mb-3">
                            <button type="submit" name="update_pass" class="btn"
                                style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; border: none; width: 100%; padding: 10px; border-radius: 5px; font-size: 1.2rem;">Update
                                Password</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
    body {
        background: url('https://images.pexels.com/photos/259100/pexels-photo-259100.jpeg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Arial', sans-serif;
    }
</style>



<?php
include("footer.php");
?>