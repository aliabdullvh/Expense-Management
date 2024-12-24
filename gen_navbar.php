<nav class="navbar navbar-expand-lg shadow bg-white px-5"
    style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-bottom: 3px solid #6a11cb;">
    <div class="container-fluid">
        <a class="navbar-brand me-md-5 fw-bold" href="./home.php" style="font-size: 1.5rem; color: #2575fc;">
            <i class="bi bi-house-door me-2"></i>Home
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fw-semibold" aria-current="page" href="./index.php"
                        style="color: #2575fc; font-size: 1.1rem;">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="font-size: 1.1rem;">
                        Users
                    </a>
                    <ul class="dropdown-menu border-0 shadow">
                        <li><a class="dropdown-item py-2" href="./register_user.php">Add Users</a></li>
                        <li><a class="dropdown-item py-2" href="./display_reg_users.php">All Users</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="font-size: 1.1rem;">
                        Expenses
                    </a>
                    <ul class="dropdown-menu border-0 shadow">
                        <li><a class="dropdown-item py-2" href="./add_expense.php">Add Expense</a></li>
                        <li><a class="dropdown-item py-2" href="./all_expenses.php">Total Expenses</a></li>
                    </ul>
                </li>
            </ul>
            <div>
                <div class="dropdown">
                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: white; padding: 10px 20px; border-radius: 5px;">
                        <i class="bi bi-person-circle me-2"></i> <span><?php echo ucfirst($_SESSION['name']); ?></span>
                    </button>
                    <ul class="dropdown-menu border-0 shadow">
                        <li><a class="dropdown-item py-2" href="#">Profile</a></li>
                        <li><a class="dropdown-item py-2" href="./logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>