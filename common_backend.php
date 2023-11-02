
<?php

session_start();    //starting the session

include("dbConnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

function registerFarmer($conn){

            $userType = "farmer";

            $userName = mysqli_real_escape_string($conn, $_POST["user_reg_username"]);
            $password = mysqli_real_escape_string($conn, $_POST["user_reg_password"]);



    $userNamecheckQuery="SELECT * from usercredentials where userName='$userName'";  
    $checkuserNameResult=mysqli_query($conn,$userNamecheckQuery);

    if(mysqli_num_rows($checkuserNameResult)>0){   // if true, provided user name is existing
        echo "<script>alert('User name already exists !!! Try with a different user name');</script>";
    }
    else{  
            $sql1 = "INSERT into usercredentials (userName, password, userType ) 
         values('$userName','$password','$userType')";
            $result1 = mysqli_query($conn, $sql1);

            $sql2 = "INSERT into userdetails (userName)
         values('$userName')";

            $result2 = mysqli_query($conn, $sql2);
            if ($result1 &&  $result2) {
                  echo "<script>alert('A new user registered successfully');</script>";
            } else {
                  echo "<script>alert('User registration failed !!!');</script>";
            }
      }
   }

function login($conn){
            $userName = mysqli_real_escape_string($conn, $_POST["L_username"]);
            $password = mysqli_real_escape_string($conn, $_POST["L_password"]);

            $_SESSION['userName'] = $userName;  // initializing as session variables
            $_SESSION['password'] = $password;

            $sql = " SELECT * from usercredentials where userName='{$_SESSION['userName']}' 
            AND password='{$_SESSION['password']}' ";

            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) == 1) {
                  $row = mysqli_fetch_assoc($result);

            $_SESSION['userType'] = $row['userType'];   //the data got from the query is assigned to the session variable

                  $userType = $_SESSION['userType'];
                  if ($userType === "farmer") {
                        echo "<script>alert('Login succesful,You logged as a " . $userType . "');</script>";
                        echo "<script>window.location.href='farmer_dashboard.php';</script>";
                        exit();
                  } elseif ($userType === "Admin") {
                        echo "<script>alert('Login succesful,You logged as an " . $userType . "');</script>";
                        echo "<script>window.location.href='admin_dashboard.php';</script>";
                        exit();
                  } elseif ($userType === "Field Officer") {
                        echo "<script>alert('Login succesful,You logged as a " . $userType . "');</script>";
                        echo "<script>window.location.href='fieldOfficer_dashboard.php';</script>";
                        exit();
                  } } 
                  else {
                  $_SESSION['login_error'] = "Invalid username or password";
                  echo "<script>alert( '" . $_SESSION['login_error'] . "');</script>";
                  header("refresh:0;url=home.php");
                  exit();
            }
      }

function emailSubmitToResetPassword($conn){
      $email = mysqli_real_escape_string($conn, $_POST["user_email_submit"]);

      $sql = " SELECT userName from userdetails where email='$email'" ;
      $result = mysqli_query($conn, $sql);

      if ($result && mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_assoc($result);

            $_SESSION['userNameToReset'] = $row['userName']; 

            echo "<script>window.location.href='passwordReset.php';</script>";
      }
      else{
            echo "<script>alert('Entered email is not a valid email for any user');</script>";
      }
}

function ResetPassword($conn){
      $userNameToReset=$_SESSION['userNameToReset'];
      $password = mysqli_real_escape_string($conn, $_POST["user_newpassword"]);
     
      $sql= "UPDATE usercredentials SET password ='$password' where userName='$userNameToReset'";
      $result = mysqli_query($conn, $sql);

      if($result){
            echo "<script>alert('Password has been reset successfully.You will be able to login now');</script>";
            echo "<script>window.location.href='home.php';</script>";
      }
      else{
            echo "<script>alert('An error occured while resetting the password');</script>";
      }


}



function submitContactForm($conn){
       $userType = "guest";
       $userName="guest";
       $name = mysqli_real_escape_string($conn, $_POST['name']);
       $contact = mysqli_real_escape_string($conn, $_POST['contact']);
       $email = mysqli_real_escape_string($conn, $_POST['email']);
       $message = mysqli_real_escape_string($conn, $_POST['question']);

       $sql = "INSERT into queries (userName,Name, userType,contact,email,message )
      values('$userName','$name','$userType','$contact','$email','$message')";

       $result = mysqli_query($conn, $sql);
       if ($result) {
      echo "<script>alert('Your inquiry submitted .We will contact you as soon as possible');</script>";
       } else {
       echo "<script>alert('An error occured while submitting the inquiry');</script>";
       }
}
function updateProfile($conn)
        {

            $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
            $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
            $adress = mysqli_real_escape_string($conn, $_POST['address']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);


            $userNameLogged = $_SESSION['userName'];  //assiging the logged username through session variable

            $sql = "UPDATE  userdetails
            SET  firstName = '$firstName',
                lastName = '$lastName',
                address = '$adress',
                contact = '$contact',
                email = '$email'
            WHERE userName = '$userNameLogged' ";   //updating the userName of logged user

            $result = mysqli_query($conn, $sql);

            if ($result) {
                  echo "<script>alert('Profile Details updated successfully');</script>";
            } else {
                  echo "<script>alert('Profile Details update Failed !!!');</script>";
            }
         }


function changePassword($conn){

      $userName = $_SESSION['userName'];
       $getSavedPassword = "SELECT password from usercredentials where userName='$userName'";
      $result = mysqli_query($conn, $getSavedPassword);

      if (mysqli_num_rows($result) > 0) {  //if password found
      $row =  mysqli_fetch_assoc($result);

      $savedPassword = $row['password'];     //getting current password

      $currentPassword = mysqli_real_escape_string($conn, $_POST['current_password']);
      $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']);

      if ($currentPassword !== $savedPassword) {    //checking new password wit current password
       echo "<script>alert('Enter the correct password !!!');</script>";
      } else {
       if ($newPassword === $savedPassword) {
       echo "<script>alert('cannot enter the current password as the new password');</script>";
      } else {
            $changePassword = "UPDATE usercredentials set password='$newPassword'
             where userName='$userName'";
            $result = mysqli_query($conn, $changePassword);

       if ($result) {
            echo "<script>alert('password changed successfully.Please login again');</script>";
            session_unset();
             session_destroy();
            echo "<script>window.location.href='home.php';</script>";  //logging out to home page
            } else {
             echo "<script>alert('An error occured while changing your password !!! Try again later');</script>";
             }} }}
              else {
             echo "<script>alert('Password Not found !!!');</script>";
            }
      }


      function deactivateAccount($conn)
        {

            $userName = $_SESSION['userName'];

            $sql = "DELETE usercredentials,userdetails 
            from usercredentials
           INNER JOIN userdetails
           ON usercredentials.userName = userdetails.userName
            where usercredentials.userName='$userName'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                  echo "<script>alert('User Account Deactivated successfully');</script>";

                  session_unset();
                  session_destroy();  //saved sessions details are clearing

                  echo "<script>window.location.href='home.php';</script>"; //redirecting back to home page
                  exit();
            } else {
                  echo "<script>alert('An error occured !!!');</script>";
            }
      }
}
function logout()
   {
      session_unset();    //clearing all sessions and their stored data
      session_destroy();
      echo "<script>alert('You have successfully logged out');</script>";
      echo "<script>window.location.href='home.php';</script>";   //redirecting back to home page
}


function viewProductGallery($conn){
      $sql = "SELECT productName ,imageFilePath from product";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

          $productName = $row['productName'];
          $imageFilePath = $row['imageFilePath'];
          echo " <div class='product-gallery'>";
          echo  "<img src='products/$imageFilePath' alt='image is unavailable'>";
          echo "<p>$productName</p>";
          echo "</div>";
        }
      } else {
        echo "<p  style='text-align: center; color:white; font-size: 1.5em; margin-right:10%;'>There are no products available right now !!! Please wait until our farmers add their products.</p>";
      }
}


function viewProfile($conn){

      $userName = $_SESSION['userName']; //getting user details from the saved logging username


      $sql = "SELECT firstName, lastName, address, contact, email, username 
          FROM userdetails 
          WHERE userName='$userName' ";

      $result = mysqli_query($conn, $sql);
      if (!$result) {
            die("Error : " . mysqli_error($conn));}
      if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            echo   " <div class='update-profile'>";  //table structure generating
            echo   "<form action='' method='POST'> ";   //generating the form to update profile details
            echo   " <h2>Your Profile Details</h2>";
            echo "<h3>user name : $row[username]</h3>";
            echo   " <div class='profile-input-box'> ";
            echo   " <label for='first_name'>First Name :</label><br> ";
            echo   "<input type='text' name='firstName' value='$row[firstName]'> ";
            echo   "</div> ";
            echo   "  <div class='profile-input-box'>";
            echo   " <label for='last_name'>Last Name :</label><br> ";
            echo   "<input type='text' name='lastName' value='$row[lastName]'> ";
            echo   "</div> ";
            echo   " <div class='profile-input-box'> ";
            echo   " <label for='adress'>Address : </label><br> ";
            echo   " <input type='text' name='address' value='$row[address]'> ";
            echo   " </div> ";
            echo   " <input type='submit' name='update_profile' value='Edit' id='btn-profile-update'>";
            echo   " <div class='profile-input-box'> ";
            echo   " <label for='contact'>Contact No :</label><br>";
            echo   "<input type='text' name='contact' value='$row[contact]'> ";
            echo   " </div> ";
            echo   " <div class='profile-input-box'>";
            echo   " <label for='email'>Email :</label><br>";
            echo   " <input type='email' name='email' value='$row[email]'>";
            echo   " </div>";
            echo   " </form>";
            echo   " </div> ";
      }
}

if (isset($_POST['registerButton'])) {
      registerFarmer($conn);
}
if (isset($_POST['loginButton'])) {
      login($conn);
}
if (isset($_POST['email_submit_button'])) {
      emailSubmitToResetPassword($conn);
}
if (isset($_POST['password_reset_button'])) {
      ResetPassword($conn);
}
if (isset($_POST['question-submit'])) {
      submitContactForm($conn);
}

if (isset($_POST['buttonLogout'])) {
      logout();
}
if (isset($_POST['update_profile'])) {
      updateProfile($conn);
}
if (isset($_POST['change_password'])) {
      changePassword($conn);
}
if (isset($_POST['confirmDelete'])) {
      deactivateAccount($conn);
}

?>