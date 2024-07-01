<?php
require('../includes/dbconnection.php');
require('../includes/function.php');
session_start();
if(isset($_POST["btnSubmit"]))
{
    if($_POST["btnSubmit"] == "UserRegister")
    {
        // $user_id=$POST['user_id'];
         $firstname=$_POST['firstname'];
         $lastname=$_POST['lastname'];
         $email=$_POST['email'];
         $phoneNo=$_POST['phoneNo'];
         $passwd=$_POST['passwd'];
         $confirmPasswd=$_POST['confirmPasswd'];
        if($passwd == $confirmPasswd)
        {
            if(strlen($firstname) > 0 && strlen($lastname) > 0 && strlen($email) > 0 && strlen($phoneNo) > 0 && strlen($passwd) > 0 && strlen($confirmPasswd) > 0)
            {
                $checkUserData = checkUser($con,$email);
                if(count($checkUserData) >0)
                {
                    echo "<script>alert('Data already exists, Kindly Login');window.location.href='Login.php'</script>";
                }
                else{
                    $sql="INSERT INTO registrationdb(firstname,email,lastname,phoneNo,passwd) VALUES('$firstname','$email','$lastname','$phoneNo','$passwd')";
                  //  echo $sql;
    
         
                    $rs=mysqli_query($con,$sql);
                
                    if($rs)
                    {
                        echo "<script>alert('Data inserted, Kindly Login');window.location.href='Login.php'</script>";
                    }
                    else
                    {
                        echo "<script>alert('Some Error Occured, Kindly re-register Again!');window.location.href='register.html'</script>";
                        
                    }
                }
                
            }
            
        }
         
    }
    else if($_POST["btnSubmit"] == "UserLogin")
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        if(strlen($email) > 0 && strlen($password) > 0)
        {
            $checkUserData = checkUser($con,$email);
            if(count($checkUserData) > 0)
            {
                if($checkUserData[0]['passwd'] == $password)
                {
                    echo "User Validated";
                }
                else{
                    $_SESSION['err'] = "1";
                    $_SESSION['message'] = "Password incorrect, Try Again!";
                    header("Location:Login.php");
                    //print("Wrong Password");

                }
                // echo "<pre>";
                // print_r($checkUserData);
            }
            else{
                $_SESSION['err'] = "1";
                $_SESSION['message'] = "Invalid User, Kindly Register!";
                header("Location:Login.php");
            }
        }
        else{

        }
    }
    
}
?>