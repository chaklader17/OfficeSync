<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OMS Login</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <header>
        <h2 class="logo">Office Management System</h2>
        <nav class="navbar">
           <?php echo '<a href="itsupport.php">IT Support</a>';
           ?>
            <button class="btnLogin-popup">Login</button>
            
        
        </nav>

    </header>
    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
        <div class="form-box login">
            <h2>Login</h2>
            <form method="POST" action = "app/login.php">
                <?php if(isset($_GET['error'])){?>

                    <div class="alert alert-danger" role="alert">
                     <?php echo stripcslashes($_GET['error']);?>
                     </div>
                 <?php }?>
                <?php if(isset($_GET['success'])){?>

                    <div class="alert alert-danger" role="alert">
                    <?php echo stripcslashes($_GET['success']);?>
                    </div>
                <?php }

                //$pass = "123";
                //$pass = password_hash($pass, PASSWORD_DEFAULT);
                //echo $pass;
                
                ?>

                <div class="details">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="text" class="form-control" name = "email";>
                    <label>Email</label>
                </div>
                <div class="details">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="text" class="form-control" name= "password">
                    <label>Password</label>
                </div>
                <button type="submit" class="button">Login</button>                
            </form>
        </div>
    </div>

    <script src="script.js">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>