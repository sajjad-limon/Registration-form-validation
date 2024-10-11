<?php 
session_start();

// getting form field values
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];

$red_flag = false;

// validate name
if(!$name){
    $red_flag = true;
    $_SESSION['name_error'] = 'Name cannot be empty!';
}

// validate email
if(!$email){
    $red_flag = true;
    $_SESSION['email_error'] = 'Email cannot be empty!';
}
else {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $red_flag = true;
        $_SESSION['email_error'] = 'Email must be on validate format!';
    }
}


// validate password
if(!$password) {
    $red_flag = true;
    $_SESSION['pass_error'] = 'Password cannot be empty!';
}
else{

    // set condition for strong password
    $upper = preg_match('@[A-Z]@', $password);
    $lower = preg_match('@[a-z]@', $password);
    $speci_chr = preg_match('@[~,`,!,#,$,%,^,&,*,(,)-,<,+,{,},/,\,_,]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if(!$upper) {
        $red_flag = true;
        $_SESSION['pass_error'] = 'At least one character should be uppercase!';
    }
    if(!$lower) {
        $red_flag = true;
        $_SESSION['pass_error'] = 'At least one character should be lowercase!';
    }
    if(!$number) {
        $red_flag = true;
        $_SESSION['pass_error'] = 'At least one character should be number!';
    }
    if(!$speci_chr) {
        $red_flag = true;
        $_SESSION['pass_error'] = 'Password should have atleast one special character!';
    }
    if(strlen($password) < 8 ) {
        $red_flag = true;
        $_SESSION['pass_error'] = 'Password should be atleast 8 characters!';
    }
}


// validate gender field
if(!$gender){
    $red_flag = true;
    $_SESSION['gender_error'] = 'Select gender!';
}


// warning when not validate
if($red_flag){
    header('location: register.php');
}

// when value in valid
else {

    header('location: register.php');
    $_SESSION['success_message'] = 'Registration Successful!';
}
