<?php

include("header.php");
include("functions.php");

check_user();

if (isset($_REQUEST["add_item"])) {

    include("db_conn.php");

    $item_name = mysqli_real_escape_string($conn, trim($_REQUEST["item_name"]));
    $item_price = mysqli_real_escape_string($conn, trim($_REQUEST["item_price"]));
    $item_date = mysqli_real_escape_string($conn, trim($_REQUEST["item_date"]));
    $item_details = mysqli_real_escape_string($conn, trim($_REQUEST["item_details"]));

    if (!empty($item_name) && !empty($item_price) && !empty($item_date)) {
        $sql = "INSERT INTO expense_info (item_name, item_price, item_date, item_details) VALUES ('$item_name', '$item_price', '$item_date', '$item_details')";

        if (mysqli_query($conn, $sql)) {
            my_alert("success", "Expense Added Successfully!");
        } else {
            my_alert("danger", "Error while adding Expense!");
        }
    } else {
        my_alert("warning", "Please fill in all required fields.");
    }

    mysqli_close($conn);
}

?>

<div class="container py-5">
    <div class="card mx-auto"
        style="max-width: 800px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
        <div class="card-header text-center"
            style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; font-size: 1.8rem; font-weight: bold; padding: 20px;">
            Add Expense
        </div>
        <div class="card-body" style="background-color: #f4f4f9; padding: 40px;">
            <form method="POST">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="item_name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="item_name" placeholder="Item Name" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="item_price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="item_price" placeholder="Amount" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="item_date" class="form-label">Date</label>
                        <input type="date" class="form-control" value="<?php echo date("Y-m-d") ?>" name="item_date"
                            required>
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="item_details" class="form-label">Details</label>
                        <textarea class="form-control" name="item_details" rows="3"
                            placeholder="Enter Details"></textarea>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" name="add_item" class="btn btn-primary px-5 py-2"
                            style="font-size: 1.2rem;">Add Expense</button>
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