<?php

    $employe_id = $_GET['id'];
    require './employe.php';
    $employe = new Employee();
    $query_result = $employe->view_employee_by_id($employe_id);
    $employe_info = mysqli_fetch_assoc($query_result);

    if(isset($_POST['btn'])){
        $employe = new Employee();
        $employe-> update_employee_info($_POST);
    }
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Student Information</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="home-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Add Employee</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="view_employe.php">View Employee</a>
                            </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-1 mt-5 bg-light p-5">
                <div class="well">
                    <h3 class="text-success p-5 text-center"><?php //echo $message;?></h3>
                    <form action="" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Employee Name:</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="employee_name" value="<?php echo $employe_info['employee_name']?>" placeholder="Enter Employee Name">
                            <input type="hidden" class="form-control" name="employee_id" value="<?php echo $employe_info['employee_id']?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Employee Phone:</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="employee_phone" value="<?php echo $employe_info['employee_phone']?>" placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Employee Email:</label>
                            <div class="col-sm-10">
                            <input type="employee_email" class="form-control" name="employee_email" value="<?php echo $employe_info['employee_email']?>" placeholder="Enter Email" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Employee Address:</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" placeholder="Address" name="employee_address" cols="30" rows="10"><?php echo $employe_info['employee_address']?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                            <button type="submit" name="btn" class="btn btn-success btn-block">Add Employee Information</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    


<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>