<?php
include("header.php");
include("functions.php");
include("db_conn.php");

if (isset($_REQUEST['del_expense_id'])) {
    $del_expense_id = $_REQUEST['del_expense_id'];
    $del_query = "DELETE FROM expense_info WHERE item_id = $del_expense_id";
    $run_del_query = mysqli_query($conn, $del_query);

    if ($run_del_query) {
        my_alert("success", " User Deleted Successfully!");
        header("Location: ./all_expenses.php");
    } else {
        my_alert("danger", "Something went wrong while deleting User");
    }
}

mysqli_close($conn);

?>




<?php
include("footer.php");
?>