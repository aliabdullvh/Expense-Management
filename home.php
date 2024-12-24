<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BudgetBuddy - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://images.pexels.com/photos/210742/pexels-photo-210742.jpeg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }

        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero-content {
            background: rgba(0, 0, 0, 0.6);
            padding: 50px;
            border-radius: 10px;
        }

        .features-section {
            padding: 80px 0;
            background-color: #f4f4f9;
        }

        .feature-box {
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="./index.php" style="font-size: 1.5rem;">BudgetBuddy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#features">Features</a>
                    </li>
                </ul>
                <a href="./login_user.php" class="btn btn-outline-light">Get Started</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1 class="display-4">Welcome to BudgetBuddy</h1>
            <p class="lead">Your personal finance companion to help manage your expenses and savings efficiently.</p>
            <a href="./login_user.php" class="btn btn-lg"
                style="background: linear-gradient(135deg, #ff416c, #ff4b2b); color: white;">Join Now</a>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="features-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col">
                    <h2>Why Choose BudgetBuddy?</h2>
                    <p>Smart features to simplify your financial management.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="feature-box">
                        <h4>Track Expenses</h4>
                        <p>Monitor your daily expenses and categorize them with ease.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-box">
                        <h4>Set Budgets</h4>
                        <p>Create and manage budgets to keep your finances on track.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-box">
                        <h4>Financial Insights</h4>
                        <p>Generate reports and gain insights into your spending habits.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>