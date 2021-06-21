<?php

include("db.php");

if(isset($_POST['login'])){

    $username=$_POST['user'];
    $password=$_POST['pass'];




    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1)
    {
        while($row = mysqli_fetch_array($result))
        {
            if(password_verify($password, $row["password"]))
            {
                session_start();
                $_SESSION['userid']=$row["username"];
                $_SESSION['sname']=$row["name"];
                $_SESSION['count']=0;
                echo '<script>window.location= "Index.php?login=success"</script>';
            }
            else
            {
                echo '<script>alert("Wrong User Details")</script>';
                echo '<script>window.location= "login.php?tryagain"</script>';
            }
        }
    }
    else
    {
        echo '<script>alert("Wrong User Details")</script>';
    }
}

if(isset($_POST['register']))
{
    $Regname = $_POST['Regname'];
    $Regemail = $_POST['Regemail'];
    $Regpass = $_POST['Regpass'];
    $CRegpass = $_POST['CRegpass'];
    
    
    if($Regpass==$CRegpass)
    {
        $hashedPwd=password_hash($Regpass,PASSWORD_BCRYPT);
        $query = "SELECT * FROM users WHERE username='$Regemail'";
        $result =mysqli_query($conn,$query) or die(mysqli_error($conn));
        if (mysqli_num_rows($result))
        {
            echo "<script type='text/javascript'>alert('Username already exists');</script>";
        }
        else
        {
            $sql = "INSERT INTO users (name, username, password ) VALUES('$Regname','$Regemail','$hashedPwd')";
            $sql_run=mysqli_query($conn,$sql);
            if($sql_run){
            echo "<script type='text/javascript'>alert('Successfully Registered');</script>";
            echo '<script>window.location= "login.php"</script>';
            }
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('the two passwords do not match');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="C:\Users\nithi\Documents\Bootstrap\css\bootstrap.min.css">
    <script type="text/javascript" src="C:\Users\nithi\Documents\Bootstrap\js\bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/c6e87f4ab3.js" crossorigin="anonymous"></script>

    
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <img src="logo/widouttext.png" alt="" class="logo">
        <h1>Geek's Cafe</h1>
        <nav>
            <ul class="nav-links">
                <li><a href="Index.php" class="under-line" >Home</a></li>
                <li><a href="" class="under-line" >Services</a></li>
                <li><a href="" class="under-line" >About Us</a></li>
                <li><a href="" class="under-line" >Contact</a></li>
            </ul>
        </nav>
        <a href="#"><button class="login-btn">Login</button></a>
    </header>
    <div class="main-by">
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                
                <form action="#" method="POST">
                    <h1>Create Account</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" placeholder="Name" name="Regname" required/>
                    <input type="email" placeholder="Email" name="Regemail" required/>
                    <input type="password" placeholder="Password" name="Regpass" required/>
                    <input type="password" placeholder="Confirm Password" name="CRegpass" required/>
                    <button type="submit" name ="register" value="register">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                
                <form action="#" method="POST">
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <span>or use your account</span>
                    <input type="email" placeholder="Email" name="user" required />
                    <input type="password" placeholder="Password" name="pass" required/>
                    <a href="#">Forgot your password?</a>
                    <button type="submit" name ="login" value="login">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>
                            To keep connected with us please login with your personal info
                        </p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    

    <script src="main.js"></script>
</body>
</html>



