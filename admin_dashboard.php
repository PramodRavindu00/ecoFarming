<?php

include("dbConnection.php");
include("common_backend.php");
include("admin_backend.php");

if (!isset($_SESSION['userName'])) {
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

    <link rel="stylesheet" href="dashboard_styles.css" type="text/css">
    <link rel="stylesheet" href="commonstyles.css" type="text/css">
    <link rel="stylesheet" href="formstyles.css" type="text/css">



    <style>
        .reg-input-box.userType {
            float: right;
            margin-bottom: 50%;
            text-align: center;
            margin-right: 10%;
        }

        li {
            display: block;
        }

        li a,
        .dropbtn {
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }

        .dropdown-content {
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            display: none;
            position: absolute;
            background-color: rgba(2, 48, 32, 0.9);
            width: 270px;
            box-shadow: 20px 20px 20px black;

        }

        .dropdown-content a {
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            text-decoration: underline;
            background-color: #023020;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .table-wrapper::-webkit-scrollbar {
            display: none;
        }

        .table-container.user {
            max-height: fit-content;
        }

        .table-wrapper.user {
            padding-left: 10px;
            margin-top: 2%;
            margin-bottom: 3%;
            margin-left: 6%;
            overflow-y: scroll;
            height: 90%;
            max-height: 70vh;
            width: 1200px;
            justify-content: center;
        }

        .section.staff-info,
        .section.farmer-info {
            height: fit-content;
        }

        .close-button{
            background-color: darkred;
        }

        .close-button:hover{
            background-color: #023020;
            color: white;
        }
    </style>
</head>

<body>
    <div>
        <header class="navbar">
            <ul>
                <li><a href="#staff-reg">Staff Registration</a></li>
                <li class="dropdown">
                    <a href="#staff-view" class="dropbtn">User info</a>
                    <div class="dropdown-content">
                        <a href="#staff-view">View Staff info</a>
                        <a href="#farmer-view">View Farmer info</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#product-section" class="dropbtn">Products</a>
                </li>
                <li><a class="" href="#profile">Profile</a></li>
                <form action="common_backend.php" method="POST">
                    <input type="submit" id="btnPopUp" name="buttonLogout" value="Logout">
                </form>
            </ul>
        </header>
    </div>
    <div class="section staff-registration" id="staff-reg" style="padding:80px 80px 80px 80px; height:650px; margin-top:4% ">
        <div class="form">
            <form action="" method="POST" onsubmit="return formValidation();">
                <h2>Staff Registration</h2>
                <div class="reg-input-box userType">
                    <label for="new_password">Choose the user type :</label><br>
                    <select name="userType">
                        <option value="Admin">Admin</option>
                        <option value="Field Officer">Field Officer</option>
                    </select>
                </div>
                <div class="reg-input-box">
                    <label for="userName">User Name :</label><br>
                    <input type="text" name="userName" id="userName" required>
                </div>

                <div class="reg-input-box">
                    <label for="password">Password :</label><br>
                    <input type="password" name="password" id="password">
                </div>
                <div class="reg-input-box">
                    <label for="confirmPassword">Confirm Password :</label><br>
                    <input type="password" name="confirmPassword" id="confirmPassword">
                </div>
                <div style="margin-top: 20px">
                <span style="margin:10px 0 0 60px; font-size: small; color: red;" 
                id="error-message"></span>
                </div>
                <input type="submit" name="registerStaff" value="Register" class="registerStaff"><br>
            </form>
        </div>
    </div>

    <div class="section staff-info" id="staff-view">
        <div class="staff">
            <h1 style="margin-left:12%;">Staff Details</h1>
            <div class="table-container user">
                <div class="table-wrapper user">
                    <table id="all-staff-table">

                        <?php
                        viewStaff($conn);
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="section farmer-info" id="farmer-view">
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
    <div class="container" id="product-section"style="padding-top: 30px; height:660px">
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
            <form action="admin_dashboard.php#product-section" method="post" class="search-product-form">
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
    <div class="profile-header" id="profile" style="padding-top: 70px;">
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
                <input type="button" id="deactivate" value="Deactivate Account" onclick="openForm('delete-confirm');" required>
            </div>
        </div>
        <div class="overlay" id="overlay"></div>
    </div>

    <!-- confirm delete pop up form -->

    <div class="popup-form" id="delete-confirm" style="background-color: white;">
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
    <script src="script.js"></script>
</body>

</html>


<?php
mysqli_close($conn);
?>