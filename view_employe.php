<?php

    session_start();
    $message='';
    require_once './employe.php';
    $employee = new Employee();

    if(isset($_GET['delete'])){
        $id= $_GET['delete'];
        $message = $employee -> delete_employee_info($id);

    }

    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }

    

    $query_result = $employee->view_employee_info();



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
                                <a class="nav-link active" href="save_employe_info.php">Add Employee</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">View Employee</a>
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
                <h3 class="text-success p-5 text-center"><?php echo $message;?></h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Sl. No</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Employee Phone</th>
                            <th scope="col">Employee Email</th>
                            <th scope="col">Employee Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php while ($employeee_info = mysqli_fetch_assoc($query_result)){?>
                        <tr>
                            <td><?php echo $employeee_info ['employee_id']?></td>
                            <td><?php echo $employeee_info ['employee_name']?></td>
                            <td><?php echo $employeee_info ['employee_phone']?></td>
                            <td><?php echo $employeee_info ['employee_email']?></td>
                            <td><?php echo $employeee_info ['employee_address']?></td>
                            <td>
                                <a href="edit_employe_info.php?id=<?php echo $employeee_info ['employee_id']?>"><span class="btn btn-success">Edit</span></a>
                                <a href="?delete=<?php echo $employeee_info ['employee_id']?>"><span class="btn btn-danger">Del</span></a>
                            </td>
                        </tr>
                     <?php }?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    


<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>