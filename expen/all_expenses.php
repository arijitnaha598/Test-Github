<?php
// session_start();

include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");

// echo $_SESSION['name'];
// echo "<br>";
// echo $_SESSION['picture'];
// echo "<br>";
//login na kore jate keu access na korte pare 
// $_SESSION['is_login'];

check_user();



?>


<div class="container py-3">
    <h2 class="text-center display-5 fw-bold py-5">Date Wise Expense</h2>
    <div class="row px-3">
        
        <div class="col-xl-6 col-lg-6">
            <a href="./today_expenses.php">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Today Expenses</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php
                                $today_date = date("Y-m-d");
                                $fetch_today_expense = "SELECT * FROM `expense_info` WHERE `item_date`='$today_date' ORDER BY `item_date` DESC";
                                $run_fetch_today_expense = mysqli_query($conn,$fetch_today_expense);

                                echo mysqli_num_rows($run_fetch_today_expense);
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
            <a href="./yesterday_expenses.php">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Yeasterday Expenses</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php
                                $yesterday_date = date("Y-m-d",strtotime("-1 days"));
                                $fetch_yesterday_expense = "SELECT * FROM `expense_info` WHERE `item_date`='$yesterday_date'";
                                $run_fetch_yesterday_expense = mysqli_query($conn,$fetch_yesterday_expense);

                                echo mysqli_num_rows($run_fetch_yesterday_expense);
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
            <a href="./seven_days_expenses.php">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Last Week Expenses</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php
                                $today_date= date("Y-m-d");
                                $previous_seven_days_date= date("Y-m-d",strtotime($today_date . "-1 week"));
                                // $converted_date= date("Y-m-d", $previous_seven_days_date);
                                // echo $today_date . " - " . $converted_date;
                                $fetch_seven_days_expense = "SELECT * FROM `expense_info` WHERE `item_date` BETWEEN '$previous_seven_days_date' AND '$today_date'";
                                $run_fetch_seven_days_expense = mysqli_query($conn,$fetch_seven_days_expense);

                                echo mysqli_num_rows($run_fetch_seven_days_expense);
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
            <a href="./month_expenses.php">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Month Expenses</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <?php
                                $today_date= date("Y-m-d");
                                $previous_month_date= date("Y-m-d",strtotime($today_date . "-1 month"));
                                // $converted_date= date("Y-m-d", $previous_seven_days_date);
                                // echo $today_date . " - " . $converted_date;
                                $fetch_month_expense = "SELECT * FROM `expense_info` WHERE `item_date` BETWEEN '$previous_month_date' AND '$today_date'";
                                $run_fetch_month_expense = mysqli_query($conn,$fetch_month_expense);

                                echo mysqli_num_rows($run_fetch_month_expense);
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
</div>














<?php
include("./includes/footer.php");
?>