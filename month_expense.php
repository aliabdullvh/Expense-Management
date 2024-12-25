<?php
include("header.php");
include("functions.php");
include("db_conn.php");
?>
<div class="container" style="margin-top: 50px; max-width: 900px;">
    <div class="" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px; overflow: hidden;">
        <div class="card-header"
            style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; text-align: center; font-size: 1.5rem; font-weight: bold; padding: 20px;">
            Last Month's Expenses
        </div>
        <div class="card-body" style="background-color: #f4f4f9; padding: 20px;">
            <div class="row mb-4">
                <div class="col-12 text-end">
                    <a href="./add_expense.php" class="btn"
                        style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; border: none; padding: 10px 20px; font-size: 1.1rem;">Add
                        Expense</a>
                </div>
            </div>
            <div class="table-responsive">
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
                        $today_date = date("Y-m-d");
                        $previous_seven_days_date = date("Y-m-d", strtotime($today_date . "-1 month"));
                        $fetch_expense = "SELECT * FROM expense_info WHERE item_date BETWEEN '$previous_seven_days_date' AND '$today_date' ORDER BY item_date DESC";
                        $run_fetch_expense = mysqli_query($conn, $fetch_expense);
                        $expense_counter = 1;
                        $total = 0;
                        if (mysqli_num_rows($run_fetch_expense) > 0) {
                            while ($row = mysqli_fetch_assoc($run_fetch_expense)) {
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