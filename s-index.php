<?php
session_start();


include('php/s-auth.php');
include('connection/dbconfig.php'); // Include your database connection file



?>

<!DOCTYPE html>
<html>

<head>
    <title>FEUTOR</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">

</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-green bg-green">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#">FEUTOR</a>
            <!-- Toggler Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="s-index.php">Find a Tutor</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="appointmentsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Appointments
                        </a>
                        <div class="dropdown-menu" aria-labelledby="appointmentsDropdown">
                            <a class="dropdown-item" href="s-pending.php">Pending</a>
                            <a class="dropdown-item" href="s-waitingforpayment.php">Waiting for Payment</a>
                            <a class="dropdown-item" href="s-approved.php">Accepted</a>
                            <a class="dropdown-item" href="s-declined.php">Declined</a>
                            <a class="dropdown-item" href="s-finished.php">Finished</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notifications</a>
                    </li>
                    <li class="nav-item dropdown user-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $user_firstname; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="s-profile.php">Edit Profile</a>
                            <a class="dropdown-item" href="s-logout.php">Logout</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>




    <!-- Content area to display tutor data -->
    <div class="container mt-3" style="align-contents:center;">

        <h1 class="s-header">Find tutors for private lessons.</h1>


        <form method="GET" action="s-index.php" class="form-inline my-3">
            <input type="text" name="subjectSearch" class="form-control mr-2" placeholder="Search by Subject">
            <select name="dayOfWeek" class="form-control mr-2">
                <option value="">Select Day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>


        <div class="row justify-content-center">
            <?php include('php/tutorselection.php'); ?>
        </div>
    </div>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</body>

</html>