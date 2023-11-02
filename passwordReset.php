<?php

include("dbConnection.php");
include("common_backend.php");   //including necessary php files

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="commonstyles.css" type="text/css" />
<style>
    body{
        background-image: url('images/reset.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }   
    .popup-form {
        display: block;
     position: fixed;
     top: 55%;
     left: 50%;
     transform: translate(-50%, -50%) scale(1.2);
     padding: 20px;
     z-index: 3;
  border:none;
  border-radius: 20px;
  box-shadow: 10px 10px 10px;
  background-color: rgba(0, 0, 0, 0.8);
  justify-content: space-evenly;
  align-items: center;
  overflow: hidden;
   }


  /*form close button and back button*/
   .close-button {
  position: absolute;
  top: 0;
  width: 45px;
  height: 40px;
  background: #023020;
  color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  cursor: pointer;
  z-index: 1;
  border-bottom-left-radius: 20px;
  right: 0;
  margin-right: 0;
   }

  .btn {
  /*submit buttons for all forms*/
  width: 100%;
  height: 40px;
  background: #023020;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1em;
  color: #fff;
  font-weight: 600;
  }

  .popup-form h2 {
  margin-top: 20px;
  font-size: 2em;
  font-weight: 100;
  text-align: center;
  color: #fff;
  }

  #newPasswordForm h2,
  #newPasswordForm .input-box {
  margin-top: 30px;
  }

 .input-box {
  position: relative;
  width: 100%;
  height: 18px;
  border-bottom: 2px solid white;
  margin: 30px 0;
  }

  .input-box label {
  position: absolute;
  top: 50%;
  left: 5px;
  transform: translateY(-50%);
  font-size: 1em;
  font-weight: 100;
  pointer-events: none;
  transition: 0.5s;
  color: #fff;
  }

  .input-box input:focus ~ label, 
  .input-box input:valid ~ label{
    top: -15px;
  transform: translateX(-5px);
    color: #39ff14;
  }

 .input-box input {
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  font-size: 1em;
  font-weight: 100;
  padding: 0 35px 0 5px;
 } 

 input {
   color: #fff;
 }

</style>

<script>
  function backToHomePage() {
    let homePageUrl = 'home.php';
    let choice= confirm("Password resetting will be cancelled,You will be redirecting to the home page");
       //confirm box to check the choice of the user
    if(choice){
        window.location.href='home.php';
    }

   }


  function resetPasswordValidation() {
  let newPasswordReset = document.getElementById("newPasswordReset").value;
  let confirmPasswordReset = document.getElementById("confirmPasswordReset").value;
  let errorSpan = document.getElementById("resetError");
  let errors = [];

  if (/\s/.test(newPasswordReset) || /\s/.test(confirmPasswordReset)) {
    errors.push("* Passwords must not contain spaces *");
    document.getElementById("newPasswordReset").value = "";
    document.getElementById("confirmPasswordReset").value = "";
  }
  else if (newPasswordReset.length < 6) {
    errors.push(" * Password should have at least 6 characters *");
    document.getElementById("newPasswordReset").value = "";
    document.getElementById("confirmPasswordReset").value = "";
  }
  else if (newPasswordReset !== confirmPasswordReset) {
    errors.push("* Passwords do not match *");
    document.getElementById("newPasswordReset").value = "";
    document.getElementById("confirmPasswordReset").value = "";
  }

  if (errors.length > 0) {
    errorSpan.innerHTML = errors.join("<br>");
    return false; // Prevent form submission
  }

  return true; // Allow form submission
 }
</script>

</head>
<body>

<form action="" class="popup-form" id="newPasswordForm" method="POST" onsubmit="return resetPasswordValidation();">
    <span class="close-button" onclick="backToHomePage();">X</span>
    <h2>Create new <br>Password</h2>
    <div class="input-box">
        <input type="password" name="user_newpassword" id="newPasswordReset" />
        <label>Password</label>
    </div>
    <div class="input-box">
        <input type="password" name="user_confirmnewpassword" id="confirmPasswordReset"/>
        <label>Confirm Password</label>
    </div>
    <div style="margin-bottom: 20px">
        <span style="font-size: small; color: red;"
         id="resetError"></span>
    </div>
    <input type="submit" class="btn" value="Reset Password" name="password_reset_button">
</form>
  
</body>
</html>