

<?php

include("dbConnection.php");
include("common_backend.php");
include("fieldOfficer_backend.php");

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
  <title>Field officer</title>

  <link rel="stylesheet" href="dashboard_styles.css" type="text/css">
  <link rel="stylesheet" href="commonstyles.css" type="text/css">
  <script src="script.js"></script>
 
<style>
         .table-wrapper::-webkit-scrollbar {
      display: none;
      }
  .table-container.user{
  max-height: fit-content;
     }
   .table-wrapper.user {
  padding-left: 10px;
  margin-top: 2%;
  margin-bottom:3% ;
  margin-left: 6%;
  overflow-y: scroll;
  height: 90%;
  max-height: 70vh;
  width:1200px;
  justify-content: center;
    }
 .section.farmer-info{
  margin-top: 2%;
    height: fit-content;
     }

 .table-container.query{
  max-height: fit-content;
    }
   .table-wrapper.query {
  margin-top: -10px;
  overflow-y: scroll;
  height: 90%;
  max-height: 70vh;
  width:1100px;
  justify-content: center;
    }
 .section.query{
  margin-top: -60px;
    height: fit-content;
    }
     .queries{
  background-color: transparent;
  padding:0 0 20px 0 ;
  box-shadow: none;
      }
</style>

</head>

<body>
  <div>
    <header class="navbar">
      <ul>
        <li><a href="#farmer-info">Farmers Info</a></li>
        <li><a href="#product-section">Products</a></li>
        <li><a href="#query" >Queries</a></li>
        <li><a href="#profile" >Profile</a></li>
        <form action="common_backend.php" method="POST">
                <input type="submit" id="btnPopUp" name="buttonLogout" value="Logout">
                </form>
      </ul>
    </header>
  </div>
<div class="section farmer-info" id="farmer-info">
  <div class="farmer">
        <h1 style="margin-left:12%">Farmer Details</h1>
            <div class="table-container user">
                <div class="table-wrapper user">
                    <table id="all-farmer-table">

                        <?php
                        viewFarmer($conn);
                        ?>
                    </table>
                </div>
            </div>
        </div>
</div>

  <div class="container" id="product-section" style="padding-top: 30px; height:650px">
    <div class="all-poducts">
      <div class="table-container all-product">
        <div class="table-wrapper all-products">
          <table id="all-products-table">
            <?php
            viewProducts($conn);
            ?>
          </table>
        </div>
      </div>
    </div>
    <div class="search-products">
      <form action="fieldOfficer_dashboard.php#product-section" method="post" class="search-product-form">
        <input type="text" name="productSearchKey" placeholder="Enter Product Name" class="search-key" required>
        <input type="submit" name="btnSearchProduct" value="Search" class="search-button">
      </form>
      <div class="table-container">
        <div class="table-wrapper search-product">
          <table id="search-product-table">
            <tr>
              <th colspan="3">Search results</th>
            </tr>
            <?php
            if (isset($_POST['btnSearchProduct'])) {
              searchProduct($conn);
            }

            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
<div class="section query" id="query">
  <div class="queries">
        <h1 style="margin-left:2%; margin-bottom:20px">Recieved Queries</h1>
            <div class="table-container query">
                <div class="table-wrapper query">
                    <table id="all-farmer-table">
                        <?php
                        viewQueries($conn);
                        ?>
                    </table>
                </div>
            </div>
        </div>
</div>

<div class="profile-header" id="profile" style="padding-top:70px">
    <h1>My Account</h1>
  </div>
  <div class=" section profile-container" id="profile-section" >

    <?php
    viewProfile($conn);     //calling the function inside html elements
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
            onclick="openForm('delete-confirm');" required >
        </div>
        
    </div>
    <div class="overlay" id="overlay"></div>
</div>

  <!-- confirm delete pop up form -->

<div class="popup-form" id="delete-confirm">
    <span class="close-button" onclick="closeForm('delete-confirm')" >X</span>
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
mysqli_close($conn);   //closing the database connection
?>