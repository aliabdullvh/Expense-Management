<?php
include("header.php");

if (isset($_REQUEST['register'])) {

    include("db_conn.php");

    //getting input values from html form
    $user_name = $_REQUEST['user_name'];
    $user_pass = $_REQUEST['user_pass'];

    //inserting data into database
    $sql = "INSERT INTO reg_users (user_name, user_pass)
VALUES ('$user_name', '$user_pass')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<div style="position: absolute; right: 20px; top: 20px " class="alert alert-success alert-dismissible fade show"
    role="alert">
    New Record created Successfully!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<div class="container">
    <div class="card myCard">
        <div class="card-header"
            style="background-color: #555555; color: #fff; text-align: center; display: flex; justify-content: center; align-items: center; height: 60px;">
            Register User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">User Name</label>
                            <input type="text" class="form-control" name="user_name">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">User Password</label>
                            <input type="password" class="form-control" name="user_pass">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="register" class="btn"
                                style="background-color: #555555; color: #fff; border: none; border: none; width: 100%;">Register</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include("footer.php");
?>