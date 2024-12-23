<?php
include("header.php");
include("functions.php");

if (isset($_REQUEST['register'])) {
    include("db_conn.php");

    $user_name = $_REQUEST['user_name'];
    $user_pass = $_REQUEST['user_pass'];

    $sql = "INSERT INTO reg_users (user_name, user_pass) VALUES ('$user_name', '$user_pass')";

    if (mysqli_query($conn, $sql)) {
        my_alert("success", "Account Created Successfully!");
    } else {
        my_alert("danger", "Error while creating account!");
    }

    mysqli_close($conn);
}
?>

<div class="container" style="margin-top: 50px;  max-width: 900px;">
    <div class="card myCard" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
        <div class="card-header"
            style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; text-align: center; font-size: 1.5rem; font-weight: bold; padding: 20px;">
            Register for BudgetBuddy
        </div>
        <div class="card-body" style="background-color: #f4f4f9; padding: 30px;">
            <div class="row">
                <div class="col-12">
                    <form method="POST" style="font-size: 1.1rem;">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">User Name</label>
                            <input type="text" class="form-control" name="user_name" id="user_name" required
                                style="border: 1px solid #ccc; border-radius: 5px;">
                        </div>
                        <div class="mb-3">
                            <label for="user_pass" class="form-label">Password</label>
                            <input type="password" class="form-control" name="user_pass" id="user_pass" required
                                style="border: 1px solid #ccc; border-radius: 5px;">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="register" class="btn"
                                style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; border: none; width: 100%; padding: 10px; border-radius: 5px; font-size: 1.2rem;">Create
                                Account</button>
                        </div>
                        <div class="text-center" style="margin-top: 20px;">
                            <p>Already have an account? <a href="login.php"
                                    style="color: #2575fc; font-weight: bold;">Login here</a></p>
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