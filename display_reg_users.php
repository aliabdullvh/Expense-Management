<?php
include("header.php");
include("functions.php");
include("db_conn.php");
?>
<div class="container" style="margin-top: 50px; max-width: 700px;">
    <div class="card myCard" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
        <div class="card-header"
            style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; text-align: center; font-size: 1.5rem; font-weight: bold; padding: 20px;">
            Registered Users
        </div>
        <div class="card-body" style="background-color: #f4f4f9; padding: 20px;">
            <div class="row mb-4">
                <div class="col-12 text-end">
                    <a href="./register_user.php" class="btn"
                        style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; border: none; padding: 10px 20px; font-size: 1.1rem;">Add
                        User</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center" style="font-size: 1rem;">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" style="width: 10%; white-space: nowrap;">ID</th>
                            <th scope="col" style="width: 30%; white-space: nowrap;">User Name</th>
                            <th scope="col" style="width: 30%; white-space: nowrap;">User Picture</th>
                            <th scope="col" style="width: 30%; white-space: nowrap;">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $fetch_data = "SELECT reg_id, user_name, user_pic FROM reg_users ORDER BY reg_id ASC";
                        $run_fetch_data = mysqli_query($conn, $fetch_data);
                        $counter = 1;
                        if (mysqli_num_rows($run_fetch_data) > 0) {
                            while ($row = mysqli_fetch_assoc($run_fetch_data)) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $counter++; ?></th>
                                    <td><?php echo $row['user_name']; ?></td>
                                    <td>
                                        <a href="upload_img.php?user_id=<?php echo $row['reg_id']; ?>">
                                            <img width="50px" class="rounded-circle"
                                                src="./images/<?php echo $row['user_pic'] ? $row['user_pic'] : 'dummy.jpeg'; ?>"
                                                alt="User Image">
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a class="me-2 btn"
                                                style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; border: none; padding: 5px 10px; font-size: 0.8rem;"
                                                href="./update_user_pass.php?update_pass_id=<?php echo $row['reg_id']; ?>">Change
                                                Password</a>
                                            <a class="btn"
                                                style="background: linear-gradient(135deg, #ff416c, #ff4b2b); color: #fff; border: none; padding: 5px 10px; font-size: 0.8rem;"
                                                href="./delete_user.php?delete_id=<?php echo $row['reg_id']; ?>">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">
                                    <h3 class="text-danger text-center">No Records Found!</h3>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
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

    .table-responsive::-webkit-scrollbar {
        display: none;
    }
</style>

<?php
include("footer.php");
?>