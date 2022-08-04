<?php
include 'dbconnect.php';
$success='';
$error='';


if (isset($_POST['add'])) {
    $fname=mysqli_real_escape_string($conn,$_POST['fname']) ;
    $dob=mysqli_real_escape_string($conn,$_POST['dob']) ;
    $city=mysqli_real_escape_string($conn,$_POST['city']) ;
    $age=mysqli_real_escape_string($conn,$_POST['age']) ;
    

 
    $sql="insert into students (fname,dob,city,age) values('$fname','$dob','$city','$age')";
    $run = mysqli_query($conn,$sql);
    
    if($run){
        $success="Add Student Registered Successfully";
    }
    else{
        $error="Unable to submit";
    }
    

}
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_main.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="main.php">
                        SMS
                    </a>
                </li>
                <li>
                    <a href="main.php"><i class="bi bi-house-fill"></i>Home</a>
                </li>
                <li>
                    <a href="add_student.php">Add Student</a>
                </li>
                <li>
                    <a href="view_student.php">View Student</a>
                </li>
                
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
            <section id="main-form">
                
                <h2 class="text-center text-danger pt-3 font-weight-bold">
                    Student Management System
                </h2>
                <div class="container bg-danger" id="formsetting">
                    <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Add Student detail</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="container">
                            <div class="form-group my-2">
                                <label class="text-white">Full Name</label>
                                <input type="text" name="fname" placeholder="Enter your full name" class="form-control" required="required" />
                            </div>
                            <div class="form-group my-2">
                                <label class="text-white">Date of Birth</label>
                                <input type="date" name="dob" placeholder="Enter your Date of Birth" class="form-control" required="required" />
                            </div>
                            <div class="form-group my-2">
                                <label class="text-white">City</label>
                                <input type="text" name="city" placeholder="Enter your citi" class="form-control" required="required" />
                            </div>
                            <div class="form-group my-2">
                                <label class="text-white">Age</label>
                                <input type="text" name="age" placeholder="Enter your age" class="form-control" required="required" />
                            </div>
                            <input type="submit" value="Add Student" name="add" class="btn btn-success px-5 my-3" />
                            <span class="text-center text-white font-weight-bold"><?php echo $success;echo $error ?></span>
                        </div>
                    </form>

                </div>
            </section>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- Navbar script -->
    <script>
        $(document).ready(function() {
            var trigger = $('.hamburger'),
                overlay = $('.overlay'),
                isClosed = false;

            trigger.click(function() {
                hamburger_cross();
            });

            function hamburger_cross() {

                if (isClosed == true) {
                    overlay.hide();
                    trigger.removeClass('is-open');
                    trigger.addClass('is-closed');
                    isClosed = false;
                } else {
                    overlay.show();
                    trigger.removeClass('is-closed');
                    trigger.addClass('is-open');
                    isClosed = true;
                }
            }

            $('[data-toggle="offcanvas"]').click(function() {
                $('#wrapper').toggleClass('toggled');
            });
        });
    </script>
    <!-- Navbar script ends -->

</body>

</html>