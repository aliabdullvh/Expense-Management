<nav class="navbar navbar-expand-lg shadow-lg px-5"
    style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff;">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="./index.php">
                        <i class="bi bi-house-door-fill me-1"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-people-fill me-1"></i> Users
                    </a>
                    <ul class="dropdown-menu shadow" style="background-color:rgb(255, 255, 255);">
                        <li><a class="dropdown-item " href="./register_user.php">Add Users</a></li>
                        <li><a class="dropdown-item " href="./display_reg_users.php">All Users</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-wallet2 me-1"></i> Expenses
                    </a>
                    <ul class="dropdown-menu shadow" style="background-color:rgb(255, 255, 255);">
                        <li><a class="dropdown-item" href="./add_expense.php">Add Expense</a></li>
                        <li><a class="dropdown-item" href="./all_expenses.php">Total Expenses</a></li>
                        <li><a class="dropdown-item" href="./Search_expenses.php">Search Expenses</a></li>

                    </ul>
                </li>
            </ul>
            <div class="me-4">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="background:rgb(232, 45, 45); color: #fff; border: none;">
                        <i class="bi bi-person-circle me-2"></i> <span><?php echo ucfirst($_SESSION['name']); ?></span>
                    </button>
                    <ul class="dropdown-menu shadow px-1" style="background-color:rgb(255, 255, 255);">
                        <li><a class="dropdown-item " href="./logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>