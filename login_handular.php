<?php
session_start();
include('includes/config.php');

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$name = mysqli_escape_string($conn,$_POST['your_name']);
$password = mysqli_escape_string($conn,$_POST['your_pass']);

//$sql ="SELECT `email` FROM admin_user WHERE email='$name'";
//$pass ="SELECT `password` FROM admin_user WHERE email='$name'";
$admin_usersql ="SELECT `admin_id`,`username`,`email` FROM admin_user WHERE email='$name' AND password='$password'";



if($conn){
         
    
    $respass = mysqli_query($conn, $admin_usersql);
         if (mysqli_num_rows($respass) > 0) {
             //select
          
              
                
               
                    while($usersessiondata = mysqli_fetch_assoc($respass)) {
                        $_SESSION['userdata'] = array(
                            'name' =>$usersessiondata['username'],
                            'id' => $usersessiondata['admin_id'],
                            'username' => $usersessiondata['email']
                         ); 
                        }
                        $dinesh =$_SESSION['userdata']['id'];
                        $roles ="SELECT `role_name` FROM admin_roles LEFT JOIN admin_user_role ON admin_roles.role_id = admin_user_role.role_id WHERE admin_user_role.adin_id = '$dinesh'";
                    $result = mysqli_query($conn,$roles);
                        $row1 = mysqli_fetch_assoc($result);
                    $_SESSION['signinformdata'] = array(
                        'name' =>$adminname,
                        'role' =>$row1
                     );
                        header("Location:index.php");
                    }  
              else{
                  //select
        echo "<script>alert('Username $name is not registered. Please tyr signup')</script>";
        echo "<script>window.open('signup.php','_self')</script>";
                $_SESSION['signinformdata']['cperror'] = "Invalid Credentials!!";
                header("Location:login.php");
              }
            
        mysqli_close($conn);
    }
   
?>