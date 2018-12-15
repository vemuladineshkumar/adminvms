
<?php
session_start();

include('includes/config.php');
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$roles="SELECT * FROM admin_roles";
$result = mysqli_query($conn,$roles);
$row = array();
if (mysqli_num_rows($result) > 0) {
    //select

    while($row1 = mysqli_fetch_assoc($result)) {
       array_push($row,$row1);
        }
    }
?><!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin Free Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Register</h2>
            <div class="auto-form-wrapper">
              <form method="POST" class="register-form" id="register-form" action="sigup_handular.php"">
                <div class="form-group">
                  <div class="input-group">
                   <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="<?php if(!empty($_SESSION['signupformdata']['name'])){ echo $_SESSION['signupformdata']['name']; unset($_SESSION['signupformdata']['name']);} ?>" required/>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"  value="<?php if(!empty($_SESSION['signupformdata']['username'])){ echo $_SESSION['signupformdata']['username']; unset($_SESSION['signupformdata']['username']);} ?>" required/>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                     <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
				<div class="form-group">
                  <div class="input-group">
                     <input type="password" class="form-control" name="re_pass" id="re_pass" placeholder="Repeat your password" required />
                                <span id='message' style="color:red"><?php if(!empty($_SESSION['signupformdata']['cperror'])){ echo $_SESSION['signupformdata']['cperror']; unset($_SESSION['signupformdata']['cperror']);} ?></span>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
				<div class="form-group">
                  <div class="input-group">
                     <select class="form-control" data-placeholder="Begin typing a name to filter..." multiple class="chosen-select" name="test">
                               <?php foreach($row as $adminroles){
                                ?>
                                <option value="<?php echo $adminroles['role_id']; ?>"><?php echo $adminroles['role_name']; ?></option>
                               <?php } ?>
                            </select>
                    
                  </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" checked> I agree to the terms
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Register</button>
                </div>
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Already have and account ?</span>
                  <a href="login.php" class="text-black text-small">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
</body>

</html>