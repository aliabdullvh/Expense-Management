<?php
include("header.php");
include("functions.php");

if (isset($_REQUEST['login'])) {
    include("db_conn.php");

    $user_name = $_REQUEST['user_name'];
    $user_pass = $_REQUEST['user_pass'];

    $login_query = "SELECT * FROM reg_users WHERE user_name = '$user_name'";
    $result_login_query = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($result_login_query) == 1) {
        $row = mysqli_fetch_assoc($result_login_query);
        $db_user_name = $row['user_name'];
        $db_user_pass = $row['user_pass'];

        if (password_verify($user_pass, $db_user_pass)) {
            my_alert("success", "Login Successfull");
            header("Location: index.php");
        } else {
            my_alert("danger", "Incorrect Password");
        }
    } else {
        echo "User doesn't exits";
    }


    mysqli_close($conn);
}


?>

<div class="container" style="margin-top: 50px;  max-width: 900px;">
    <div class="card myCard" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
        <div class="card-header"
            style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; text-align: center; font-size: 1.5rem; font-weight: bold; padding: 20px;">
            Login into BudgetBuddy
        </div>
        <div class="card-body" style="background-color: #f4f4f9; padding: 30px;">
            <div class="row">
                <div class="col-12">
                    <form method="POST" style="font-size: 1.1rem;">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">User Name</label>
                            <input type="text" class="form-control" required name="user_name" id="user_name" required
                                style="border: 1px solid #ccc; border-radius: 5px;">
                        </div>
                        <div class="mb-3">
                            <label for="user_pass" class="form-label">Password</label>
                            <input type="password" class="form-control" required name="user_pass" id="user_pass"
                                required style="border: 1px solid #ccc; border-radius: 5px;">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="login" class="btn"
                                style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; border: none; width: 100%; padding: 10px; border-radius: 5px; font-size: 1.2rem;">Login</button>
                        </div>
                        <div class="text-center" style="margin-top: 20px;">
                            <p>Don't have an Account? <a href="register_user.php"
                                    style="color: #2575fc; font-weight: bold;">Register here</a></p>
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