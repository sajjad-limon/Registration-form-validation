<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <!-- load css files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>


<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 10px;">
            <div class="card-body p-5">
                
              <h2 class="text-center mb-5 card-header bg-success text-white">Create New Account</h2>

              <form action="register_user.php" method="POST">

              <div class="message_area">
              <?php if(isset($_SESSION['success_message'])) { ?>
                    <h4 class="text-center text-success"> <?= $_SESSION['success_message'] ?> </h4>
                    <?php }; unset($_SESSION['success_message']); ?>                
              </div>


                <div class="form-outline mb-4">
                  <label class="form-label">Name</label>
                  <input name="name" style="border-color: <?= isset($_SESSION['name_error']) ? 'red' : '' ?>" type="text" class="form-control" placeholder="Enter your name"/>
                  <?php if(isset($_SESSION['name_error'])) { ?>
                    <span class="text-danger"> <?= $_SESSION['name_error'] ?> </span>
                    <?php }; unset($_SESSION['name_error']); ?>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Email</label>
                  <input name="email" style="border-color: <?= isset($_SESSION['email_error']) ? 'red' : '' ?>" type="text" class="form-control" placeholder="Enter your email"/>
                    <?php if(isset($_SESSION['email_error'])){ ?>
                      <span class="text-danger"> <?= $_SESSION['email_error'] ?> </span>
                      <?php } unset($_SESSION['email_error']); ?>
                </div>
                
                <div class="form-outline mb-4 password-wrap">
                  <label class="form-label">Password</label>
                  <input name="password" id="pass_field" style="border-color: <?= isset($_SESSION['pass_error']) ? 'red' : '' ?>" type="password" class="form-control" placeholder="Enter your password"/>
                  <i id="pass_icon" class="fa fa-eye"></i>
                  <?php if(isset($_SESSION['pass_error'])){ ?>
                      <span class="text-danger"> <?= $_SESSION['pass_error'] ?> </span>
                      <?php } unset($_SESSION['pass_error']); ?>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Select Gender</label>
                  
                  <div class="form-check">
                    <input class="form-check-input" style="border-color: <?= isset($_SESSION['gender_error']) ? 'red' : '' ?>" type="radio" name="gender" id="gender1" value="male">
                    <label class="form-check-label" for="gender1">
                      Male
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" style="border-color: <?= isset($_SESSION['gender_error']) ? 'red' : '' ?>" type="radio" name="gender" id="gender2" value="female">
                    <label class="form-check-label" for="gender2">
                      Female
                    </label>
                  </div>

                  <?php if(isset($_SESSION['gender_error'])){ ?>
                      <span class="text-danger"> <?= $_SESSION['gender_error'] ?> </span>
                      <?php } unset($_SESSION['gender_error']); ?>
                </div>


                <div class="button-area d-flex justify-content-center align-items-center">
                  <input type="submit" class="btn btn-success btn-block" value="Register">
                </div>
                  
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    

<!-- load js files -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

  // password show/hide functionallity
  $('#pass_icon').click(function(){

    var passField = document.getElementById('pass_field');
    if(passField.type == 'password') {
      passField.type = 'text';
    }
    else{
      passField.type = 'password';
    }
  })
</script>
</body>
</html>
