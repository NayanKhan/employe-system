<?php



    class Employee{

           protected $connection='';
           public function __construct(){
                $host_name = 'localhost';
                $user_name = 'root';
                $password = '';
                $db_name = 'db_employee_info';
                $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);
                if(!$this->connection){
                    die("Connection Failed".mysqli_error($this->$connection));
                }
            
            }

        public function save_employee_info($data){
            
            $sql = "INSERT INTO tbl_employee (employee_name, employee_phone, employee_email, employee_address) " . 
           "VALUES ('$data[employee_name]', '$data[employee_phone]', '$data[employee_email]', '$data[employee_address]')";
           if(mysqli_query($this->connection, $sql)){
                $message = "Successfully Save Employee Information";
                return $message;
           }
           else{
                die("Query Problem".mysqli_error($this->$connection));
           }

        }

        public function view_employee_info(){
            $sql = "SELECT * FROM tbl_employee";
           if(mysqli_query($this->connection, $sql)){
                $query_result = mysqli_query($this->connection, $sql);
                return $query_result;
           }
           else{
                die("Query Problem".mysqli_error($this->$connection));
           }
        }

       public function view_employee_by_id($employe_id){
            $sql = "SELECT * FROM tbl_employee WHERE employee_id='$employe_id'";
            if(mysqli_query($this->connection, $sql)){
                $query_result = mysqli_query($this->connection, $sql);
                return $query_result;
            }
            else{
                die("Query Problem".mysqli_error($this->$connection));
            }
       }

       public function update_employee_info($data){
            $sql = "UPDATE tbl_employee SET employee_name= '$data[employee_name]', employee_phone= '$data[employee_phone]', employee_email= '$data[employee_email]', employee_address= '$data[employee_address]' WHERE employee_id='$data[employee_id]' ";
            if(mysqli_query($this->connection, $sql)){
                session_start();
                $_SESSION['message']="succesfully Update Information";
                header('Location: view_employe.php');
            }
            else{
                die("Query Problem".mysqli_error($this->$connection));
            }
       }

       public function delete_employee_info($id){
            $sql = "DELETE FROM tbl_employee WHERE employee_id='$id' ";
            if(mysqli_query($this->connection, $sql)){
                $message = "Succwssfully Delete Information";
                return $message;
            }
            else{
                die("Query Problem".mysqli_error($this->$connection));
            }
        }



    }


?>