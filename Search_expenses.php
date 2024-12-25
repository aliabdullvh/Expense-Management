<?php

include("header.php");
include("functions.php");
include("db_conn.php");

check_user();

?>

<div class="container">
    <form>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center py-3 display-5 fw-bold">Search Expense</h2>
            </div>
            <div class="col-md-5 mb-3">
                <label for="" class="form-label">From</label>
                <input type="date" class="form-control" name="from_date" max="<?php echo date("Y-m-d"); ?>"
                    id="from_date" onchange="get_date()">
            </div>
            <div class="col-md-5 mb-3">
                <label for="" class="form-label">To</label>
                <input type="date" class="form-control" name="to_date" max="<?php echo date("Y-m-d"); ?>" id="to_date">
            </div>
            <div class=" col-md-2 mb-3 align-self-end">
                <button type="submit" class="btn btn-primary w-100" name="search">Search</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered table-hover align-middle text-center" style="font-size: 1rem;">
        <thead class="table-dark">
            <tr>
                <th scope="col" style="width: 10%; white-space: nowrap;">ID</th>
                <th scope="col" style="width: 30%; white-space: nowrap;">Name</th>
                <th scope="col" style="width: 30%; white-space: nowrap;">Price</th>
                <th scope="col" style="width: 30%; white-space: nowrap;">Date Added</th>
                <th scope="col" style="width: 30%; white-space: nowrap;">Expense Details</th>
                <th scope="col" style="width: 30%; white-space: nowrap;">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_REQUEST["search"])) {
                $from_date = $_REQUEST['from_date'];
                $to_date = $_REQUEST['to_date'];
                $search_expense = "SELECT * FROM expense_info WHERE item_date BETWEEN '$from_date' AND '$to_date'";
                $run_search_expense = mysqli_query($conn, $search_expense);
                $expense_counter = 1;
                $total = 0;
                if (mysqli_num_rows($run_search_expense) > 0) {
                    while ($row = mysqli_fetch_assoc($run_search_expense)) {
                        ?>
                        <tr>
                            <td><?php echo $expense_counter; ?></td>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><?php echo $row['item_price']; ?></td>
                            <td><?php customize_date($row['item_date']); ?></td>
                            <td><?php echo $row['item_details']; ?></td>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a class="me-2 btn"
                                        style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; border: none; padding: 5px 10px; font-size: 0.8rem; width: 140px;"
                                        href="./edit_expense.php?edit_expense_id=<?php echo $row['item_id']; ?>">Edit
                                    </a>
                                    <a class="btn"
                                        style="background: linear-gradient(135deg, #ff416c, #ff4b2b); color: #fff; border: none; padding: 5px 10px; font-size: 0.8rem; width: 140px;"
                                        href="./delete_expense.php?del_expense_id=<?php echo $row['item_id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php
                        $expense_counter++;
                        $total = $total + $row['item_price'];
                    }
                    ?>
                    <tr>
                        <th colspan="5">Total Amount</th>
                        <th><?php echo $total ?></th>
                    </tr>
                    <?php
                } else {
                    ?>
                    <tr>
                        <td colspan="6">
                            <h3 class="text-danger text-center">No Expense Found!</h3>
                        </td>
                    </tr>
                    <?php
                }
            }

            ?>

        </tbody>
    </table>
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