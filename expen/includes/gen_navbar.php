<nav class="navbar navbar-expand-lg shadow bg-body-tertiary px-md-5">
  <div class="container-fluid">
    <a class="navbar-brand me-md-4" href="./index.php">Expense</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./register_user.php">Add User</a></li>
            <li><a class="dropdown-item" href="./display_reg_users.php">All Users</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Expenses
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./add_expenses.php">Add Expenses</a></li>
            <li><a class="dropdown-item" href="./all_expenses.php">All Expenses</a></li>
            <li><a class="dropdown-item" href="./search_expenses.php">Search Expenses</a></li>
          </ul>
        </li>
      </ul>
      <div>
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <!-- User Profile -->
    <i class="bi bi-person-bounding-box me-3 fs-4"></i><span><?php echo ucfirst($_SESSION['name']);?></span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Profile</a></li>
    <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
  </ul>
</div>
      </div>
    </div>
  </div>
</nav>