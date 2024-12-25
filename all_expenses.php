<?php

include("header.php");
include("functions.php");
include("db_conn.php");

check_user();

// l-bg-orange-dark"
// l-bg-cherry
// l - bg - blue - dark

?>

<div class="container py-3">
    <h2 class="text-center py-3 display-5 fw-bold">Date wise Expenses</h2>
    <div class="row px-3">
        <div class="col-xl-6 col-lg-6">
            <a href="./today_expense.php">
                <div class="card l-bg-orange-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Today's Expenses</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php
                                    $today_date = date("Y-m-d");
                                    $fetch_today_expense = "SELECT * FROM expense_info WHERE item_date = '$today_date'";
                                    $run_fetch_today_expense = mysqli_query($conn, $fetch_today_expense);
                                    echo (mysqli_num_rows($run_fetch_today_expense));
                                    ?>
                                </h2>
                            </div>
                            <!-- <div class="col-4 text-right">
                                <span>2.5% <i class="fa fa-arrow-up"></i></span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6">
            <a href="./yestarday_expense.php">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Yestarday's Expenses</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php
                                    $yestarday_date = date('Y-m-d', strtotime("-1 days"));
                                    $fetch_yestarday_expense = "SELECT * FROM expense_info WHERE item_date = '$yestarday_date'";
                                    $run_fetch_yestarday_expense = mysqli_query($conn, $fetch_yestarday_expense);
                                    echo (mysqli_num_rows($run_fetch_yestarday_expense));
                                    ?>
                                </h2>
                            </div>
                            <!-- <div class="col-4 text-right">
                                <span>2.5% <i class="fa fa-arrow-up"></i></span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6">
            <a href="./seven_days_expense.php">
                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Last Week's Expenses</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php
                                    $previous_seven_days_date = date("Y-m-d", strtotime($today_date . "-1 week"));
                                    $fetch_week_expense = "SELECT * FROM expense_info WHERE item_date BETWEEN '$previous_seven_days_date' AND '$today_date'";
                                    $run_fetch_week_expense = mysqli_query($conn, $fetch_week_expense);
                                    echo (mysqli_num_rows($run_fetch_week_expense));
                                    ?>
                                </h2>
                            </div>
                            <!-- <div class="col-4 text-right">
                                <span>2.5% <i class="fa fa-arrow-up"></i></span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6">
            <a href="./month_expense.php">
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Last Month's Expenses</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php
                                    $month_date = date("Y-m-d", strtotime($today_date . "-1 month"));
                                    $fetch_month_expense = "SELECT * FROM expense_info WHERE item_date BETWEEN '$month_date' AND '$today_date'";
                                    $run_fetch_month_expense = mysqli_query($conn, $fetch_month_expense);
                                    echo (mysqli_num_rows($run_fetch_month_expense));
                                    ?>
                                </h2>
                            </div>
                            <!-- <div class="col-4 text-right">
                                <span>2.5% <i class="fa fa-arrow-up"></i></span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </a>
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