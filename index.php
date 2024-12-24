<?php

include("header.php");
include("functions.php");
include("db_conn.php");

check_user();



?>

<div class="container py-3">
    <h2 class="text-center py-3 display-5 fw-bold">BudgetBuddy</h2>
    <div class="row px-3">
        <!-- <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">New Orders</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                3,243
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                                <span>12.5% <i class="fa fa-arrow-up"></i></span>
                            </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-xl-6 col-lg-6">
            <a href="./display_reg_users.php">
                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Users</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    <?php
                                    $user_query = "SELECT user_name FROM reg_users";
                                    $run_user_query = mysqli_query($conn, $user_query);
                                    echo mysqli_num_rows($run_user_query);
                                    ?>
                                </h2>
                            </div>
                            <!-- <div class="col-4 text-right">
                                <span>9.23% <i class="fa fa-arrow-up"></i></span>
                            </div> -->
                        </div>

                    </div>
                </div>
            </a>
        </div>
        <!-- <div class="col-xl-6 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Ticket Resolved</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                578
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                                <span>10% <i class="fa fa-arrow-up"></i></span>
                            </div>
                    </div>

                </div>
            </div>
        </div> -->
        <div class="col-xl-6 col-lg-6">
            <a href="./all_expenses.php">
                <div class="card l-bg-orange-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Expenses</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    $11.61k
                                </h2>
                            </div>
                            <div class="col-4 text-right">
                                <span>2.5% <i class="fa fa-arrow-up"></i></span>
                            </div>
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