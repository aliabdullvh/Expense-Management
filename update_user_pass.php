<?php
include("header.php");
include("functions.php");
include("db_conn.php");

$update_pass_id = null;
$db_username = null;
$message = null;
$message_type = null;

// Fetching data from the database
if (isset($_REQUEST['update_pass_id'])) {
    $update_pass_id = $_REQUEST['update_pass_id'];
    $fetch_query = "SELECT user_name FROM reg_users WHERE reg_id = $update_pass_id";
    $run_fetch_query = mysqli_query($conn, $fetch_query);

    $row = mysqli_fetch_assoc($run_fetch_query);
    $db_username = $row['user_name'];
}

// Updating user password in the database
if (isset($_REQUEST['update_pass'])) {
    $current_password = $_REQUEST['current_user_pass'];
    $new_password = $_REQUEST['update_user_pass'];

    // Fetch the current password from the database
    $fetch_password_query = "SELECT user_pass FROM reg_users WHERE reg_id = $update_pass_id";
    $run_fetch_password_query = mysqli_query($conn, $fetch_password_query);
    $row = mysqli_fetch_assoc($run_fetch_password_query);

    if ($row && $row['user_pass'] === $current_password) {
        if ($current_password !== $new_password) {
            $update_query = "UPDATE reg_users SET user_pass = '$new_password' WHERE reg_id = $update_pass_id";
            $run_update_query = mysqli_query($conn, $update_query);

            if ($run_update_query) {
                $message = "Password Updated Successfully!";
                $message_type = "success";
            } else {
                $message = "Error while updating password.";
                $message_type = "danger";
            }
        } else {
            $message = "The new password cannot be the same as the current password.";
            $message_type = "danger";
        }
    } else {
        $message = "Current password is incorrect.";
        $message_type = "danger";
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
                    <?php if ($message): ?>
                        <div class="alert alert-<?php echo $message_type; ?>" role="alert" style="font-size: 1rem;">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" style="font-size: 1.1rem;">
                        <div class="mb-3">
                            <label for="" class="form-label">User Name</label>
                            <input type="text" class="form-control" value="<?php echo $db_username ?>" disabled
                                style="border: 1px solid #ccc; border-radius: 5px;">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Current Password</label>
                            <input type="password" class="form-control" name="current_user_pass" required
                                style="border: 1px solid #ccc; border-radius: 5px;">
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