<?php
include("header.php");
include("functions.php");
include("db_conn.php");

$user_id = NULL;

if (isset($_REQUEST["user_id"])) {
    $user_id = $_REQUEST["user_id"];
}

if (isset($_REQUEST['submit'])) {
    $user_pic = $_FILES['user_pic'];

    $img_name = $user_pic['name'];
    $img_tmp_name = $user_pic['tmp_name'];
    $img_extension = explode(".", $img_name);

    $new_img_name = round(microtime(true)) . "." . end($img_extension);

    $img_path = "images/" . $new_img_name;

    $img_upload_result = move_uploaded_file($img_tmp_name, $img_path);
    if ($img_upload_result) {
        $run_query = "UPDATE `reg_users` SET `user_pic`='$new_img_name' WHERE reg_id = $user_id";
        $run_query_result = mysqli_query($conn, $run_query);

        if ($run_query_result) {
            echo "<div class='alert alert-success text-center'>Image uploaded successfully!</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Error uploading image to database!</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Error uploading image to server!</div>";
    }
}

?>
<div class="container" style="margin-top: 50px; max-width: 700px;">
    <div class="card" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px; overflow: hidden;">
        <div class="card-header"
            style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; text-align: center; font-size: 1.5rem; font-weight: bold; padding: 20px;">
            Upload User Image
        </div>
        <div class="card-body" style="padding: 30px; background-color: #f9f9f9;">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="user_pic" class="form-label">Select Image</label>
                    <input type="file" class="form-control" name="user_pic" id="user_pic" required>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-lg"
                        style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; border: none; width: 50%;"
                        name="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        background: url('https://images.pexels.com/photos/259100/pexels-photo-259100.jpeg') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Arial', sans-serif;
    }

    .form-control {
        border-radius: 5px;
    }
</style>

<?php
include("footer.php");
?>