<?php
include("header.php");
include("functions.php");
include("db_conn.php");

if (isset($_REQUEST['delete_id'])) {
    $delete_id = $_REQUEST['delete_id'];
    $del_query = "DELETE FROM reg_users WHERE reg_id = $delete_id";
    $run_del_query = mysqli_query($conn, $del_query);

    if ($run_del_query) {
        my_alert("success", " User Deleted Successfully!");
        header("Location: ./display_reg_users.php");
    } else {
        my_alert("danger", "Something went wrong while deleting User");
    }
}

mysqli_close($conn);

?>




<?php
include("footer.php");
?>