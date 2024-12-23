<?php
include("header.php");
include("functions.php");
include("db_conn.php");
?>
<div class="container">
    <div class="row">
        <div class="col-12 py-4">
            <h1 class="text-center">Registered Users</h1>
        </div>
        <div class="col-12 mb-3">
            <a href="./register_user.php" class="btn" style="background-color: #555555; color: #fff" ;>Add User</a>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">User Picture</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fetch_data = "SELECT reg_id, user_name, user_pic FROM reg_users";
            $run_fetch_data = mysqli_query($conn, $fetch_data);
            if (mysqli_num_rows($run_fetch_data) > 0) {
                while ($row = mysqli_fetch_assoc($run_fetch_data)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['reg_id']; ?></th>
                        <td><?php echo $row['user_name']; ?></td>
                        <td>
                            <a href="upload_img.php?user_id=<?php echo $row['reg_id']; ?>">
                                <?php
                                if ($row['user_pic'] == NULL) {
                                    ?>
                                    <img width="70px" src="./images/dummy.jpeg" alt="Dummy Image">
                                    <?php
                                } else {
                                    ?>
                                    <img width="70px" src="./images/<?php echo $row['user_pic'] ?>" alt="User Image">
                                    <?php

                                }
                                ?>
                            </a>
                        </td>
                        <td>
                            <a href="./delete_user.php?delete_id=<?php echo $row['reg_id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>

                <tr>
                    <td colspan="2">
                        <h3 class="text-danger text-center">No Records Found!</h3>
                    </td>

                </tr>
                <?php
            }

            ?>


        </tbody>
    </table>
</div>


<?php
include("footer.php");
?>