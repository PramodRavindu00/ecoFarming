<?php


include("dbConnection.php");
include("common_backend.php");
include("farmer_backend.php");

if(!isset($_SESSION['userName'])){
  echo "<script>alert('Cannot access dashboards without login. Please go back and login');</script>";
  header('refresh:0;url= home.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="commonstyles.css" type="text/css">
  <link rel="stylesheet" href="dashboard_styles.css" type="text/css">
  <script src="script.js"></script>

<style>
 
</style>

</head>

<body>
  <div>
    <header class="navbar">
      <ul>
        <li><a href="#add-product-section">Add Products</a></li>
        <li><a href="#profile">Profile</a></li>
        <form action="common_backend.php" method="POST">
          <input type="submit" id="btnPopUp" name="buttonLogout" value="Logout">
        </form>
      </ul>
    </header>
  </div>
  <div class="add-product-container" id="add-product-section">
    <div class="add-product">
      <form action="" method="POST" enctype="multipart/form-data">
        <h2>Add your product here</h2>
        <div class="contact-inputs">
          <input type="text" name="product_name" placeholder="Enter product name" required />
        </div>
        <div class="contact-inputs">
          <label for="image" class="upload-image">Upload Product Image :</label>
          <input type="file" class="upload-image" name="image" accept=".jpg, .jpeg ,.png" required /><br>
        </div>
        <input type="submit" value="Add Product" class="submit product" name="add_product">
      </form>
    </div>

    <div class="Queries" id="Queries">
      <form action="" method="POST">
        <h2>Drop your problems here</h2>
        <div class="contact-inputs">
          <input type="text" name="name" placeholder="Enter your name" required />
        </div>
        <input type="submit" class="submit query" value="Send" name="submit_query"/>
        <div class="contact-inputs">
          <input type="text" name="contact" placeholder="Enter your Contact number" required />
        </div>

        <div class="contact-inputs">
          <input type="email" name="email" placeholder="Enter your Email" required />
        </div>
        <div class="contact-inputs">
          <textarea name="question" id="question" cols="50" rows="10" placeholder="Enter your message here (max 250 characters)"></textarea>
        </div>
      </form>


    </div>
  </div>
  <div class="profile-header" id="profile" style="padding-top: 65px;"> 
    <h1>My Account</h1>
  </div>
  <div class=" section profile-container" id="profile-section">
    <?php
    viewProfile($conn)
    ?>


    <div class="change-password">

        <form action="" method="POST" onsubmit="return changePasswordValidation();">
            <h2>Change password</h2>
            <div class="profile-input-box">
                <label for="password">Current Password :</label><br>
                <input type="password" name="current_password" id="current_password">
            </div>
            <div class="profile-input-box">
                <label for="new_password">New Password :</label><br>
                <input type="password" name="new_password" id="new_password">
            </div>
            <input type="submit" name="change_password" value="Change" id="btn-change-password">
            <div class="profile-input-box">
                <label for="confirm_password">Confirm Password :</label><br>
                <input type="password" name="confirm_password" id="confirm_password">
            </div>
            <div style="margin-top: 20px">
                <span style="margin:10px 0 0 60px; font-size: small; color: red;" 
                id="password-error"></span>
                </div>
        </form>
        <div class="deactivate">
            <input type="button" id="deactivate" value="Deactivate Account" 
            onclick="openForm('delete-confirm');" required  >
        </div>
    </div>
    <div class="overlay" id="overlay"></div>
</div>

  <!-- confirm delete pop up form -->

  <div class="popup-form" id="delete-confirm">
    <span class="close-button" onclick="closeForm('delete-confirm')">X</span>
    <h3>Are u sure u want to deactivate your account?</h3>
    <h4>This will remove all your details from our system !!!</h4>
    <form action="" method="POST">
      <input type="submit" name="confirmDelete" value="Confirm" id="confirm-delete"> <!-- confirm delete form -->
    </form>
  </div>



  <div id="footerDiv">
    <footer>
      Copyright © 2023 <a href="home.php">Ecological Farming Section</a> of
      <a href="https://doa.gov.lk/home-page/" target="_blank">Department of Agriculture</a>
      Sri Lanka -
      <a href="https://www.agrimin.gov.lk/" target="_blank">Ministry of Agriculture</a>. All rights reserved.
    </footer>
  </div>
</body>

</html>

<?php
mysqli_close($conn);
?>