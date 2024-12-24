<?php

include("header.php");
include("functions.php");
include("db_conn.php");

check_user();

$edit_expense_id = null;
$db_item_name = null;
$db_item_price = null;
$db_item_date = null;
$db_item_details = null;

//fetching data from database
if (isset($_REQUEST['edit_expense_id'])) {

    $edit_expense_id = $_REQUEST['edit_expense_id'];

    $fetch_query = "SELECT * FROM expense_info WHERE item_id = $edit_expense_id";
    $run_fetch_query = mysqli_query($conn, $fetch_query);

    $row = mysqli_fetch_assoc($run_fetch_query);
    $db_item_name = $row['item_name'];
    $db_item_price = $row['item_price'];
    $db_item_date = $row['item_date'];
    $db_item_details = $row['item_details'];
}

//Updating expense in database
if (isset($_REQUEST['update_item'])) {
    $update_item_name = $_REQUEST['update_item_name'];
    $update_item_price = $_REQUEST['update_item_price'];
    $update_item_date = $_REQUEST['update_item_date'];
    $update_item_details = $_REQUEST['update_item_details'];


    $update_query = "UPDATE `expense_info` SET  `item_name`='$update_item_name',`item_price`='$update_item_price',`item_date`='$update_item_date',`item_details`='[$update_item_details' WHERE item_id = '$edit_expense_id'";
    $run_update_query = mysqli_query($conn, $update_query);

    if ($run_update_query) {
        my_alert("success", "Expense Updated Successfully!");
    } else {
        my_alert("danger", "Error while updating Expense");
    }
}

mysqli_close($conn);

?>

<div class="container py-5">
    <div class="card mx-auto"
        style="max-width: 800px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
        <div class="card-header text-center"
            style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; font-size: 1.8rem; font-weight: bold; padding: 20px;">
            Update Expense
        </div>
        <div class="card-body" style="background-color: #f4f4f9; padding: 40px;">
            <form method="POST">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="item_name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="update_item_name" placeholder="Item Name"
                            value="<?php echo $db_item_name ?>" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="item_price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="update_item_price" placeholder="Amount"
                            value="<?php echo $db_item_price ?>" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="item_date" class="form-label">Date</label>
                        <input type="date" class="form-control" name="update_item_date"
                            value="<?php echo $db_item_date ?>" required>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="item_details" class="form-label">Details</label>
                        <input class="form-control" name="update_item_details" rows="3" placeholder="Enter Details"
                            value="<?php echo $db_item_details ?>"></input>
                    </div>
                    <div class=" col-md-12 mb-3">
                        <button type="submit" name="update_item" class="btn btn-primary px-5 py-2"
                            style="font-size: 1.2rem;">Update Expense</button>
                    </div>
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
</style>

<?php
include("footer.php");
?>