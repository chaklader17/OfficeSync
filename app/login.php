<?php
session_start();
if(isset($_POST['email']) && $_POST['password']){
    include "../database-link.php";

    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $email = validate_input($_POST['email']);
      $password = validate_input($_POST['password']);
      
      if(empty($email)){
        $em = "Your OMS email is required.";
        header("Location: ../login.php?error=$em");
        exit();


      } else  if(empty($password)){
        $em = "Your OMS password is required.";
        header("Location: ../login.php?error=$em");
        exit();


      } else{

        $sql = "SELECT * from employees WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);

        if($stmt->rowCount()==1){
            $employees = $stmt->fetch();
            $emailDb = $employees['email'];
            $nameDb = $employees['name'];
            $passwordDb = $employees['password'];
            $position = $employees['position'];
            $employee_id = $employees['employee_id'];


            if($email === $emailDb){
                if(password_verify($password, $passwordDb)){

                    if($position == "admin"){
                        $_SESSION['position'] = $position;
                        $_SESSION['employee_id'] = $employee_id;
                        header("Location: ../index.php");


                    } else if ($position == "employee"){
                        $_SESSION['position'] = $position;
                        $_SESSION['employee_id'] = $employee_id;
                        header("Location: ../index.php");


                    }
                    else{

                        $em = "An error has occured.";
                        header("Location: ../login.php?error=$em");
                        exit();

                    }

            } else{
                $em = "Your OMS email or password is incorrect.";
                header("Location: ../login.php?error=$em");
                exit();

            }
        }



      }
    }
}
else{
    
    $em = "An error has occured.";
    header("Location: ../login.php?error=$em");
    exit();
}