<?php

include("dbConnection.php");  //including necessary php files

function viewProducts($conn)
 {                
    $sql = "SELECT * From product";  
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {         //dynamically generating a table
        echo "<tr>";
        echo " <th>Product Name</th>";
        echo "  <th colspan='2'>Image</th>";
        echo " </tr>";
        while ($row = mysqli_fetch_assoc($result)) { //fetching data from the database
            echo "<tr>";
            echo "<td>" . $row["productName"] . "</td>";
            echo "<td><img src='products/" .   $row["imageFilePath"] . "'alt='Image unavailable'></td>";
            echo "<form action='' method='POST'>";
            echo "<input type='hidden' name='productName' value='" . $row["productName"] . "'>";
            echo "<td><input type='submit' class='delbtn' name='delete-product' value='Delete'></td>";
            echo "</form>";     //submit type button and form action for the delete button
            echo "</tr>"; 
        }
    }
    else{                      //if there is no data retrieved
        echo "<tr>";
        echo "<th colspan='3'>No products available right now!!!!</th>";
        echo "</tr>"; 
    }
}

function searchProduct($conn){
    
    $productName=$_POST['productSearchKey'];  

    $sql= "SELECT * from product where productName  = '$productName'  ";
    $result= mysqli_query($conn,$sql);

    if(!$result){   //if sql didnt run by any case

        die ("Error : ".mysqli_error($conn));
     }
     if(mysqli_num_rows($result)> 0){
        $row= mysqli_fetch_assoc($result);
        echo "<tr>";
        echo "<td>" . $row["productName"] . "</td>";
        echo "<td><img src='products/" .   $row["imageFilePath"] . "'alt='Image unavailable'></td>";
        echo "<td><button type='button' class='clearbtn' onclick='hideResults(this)'>Clear</button></td>";
        echo "</tr>";
     }
     else{
        echo "<tr>";
        echo "<td colspan='2'>No Product Found !!!</td>";
        echo "<td><button type='button' class='clearbtn' onclick='hideResults(this)'>Clear</button></t>";  
        echo "</tr>"; 
     }

}

function deleteProduct($conn) {
    
    if (isset($_POST['productName'])) {

        $productName = $_POST['productName'];

        $imagePath = "SELECT imageFilePath from product where productName='$productName'";
        $pathChecking = mysqli_query($conn, $imagePath);


        if ($pathChecking && mysqli_num_rows($pathChecking) > 0) {
            $row = mysqli_fetch_assoc($pathChecking);

            $deleteFromFolder = 'products/' . $row['imageFilePath'];  //file name with extension

            if (file_exists($deleteFromFolder)) {
                unlink($deleteFromFolder);    //removing the image from the directory if the image is exists
            }

            $sql = "DELETE from product where productName='$productName'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script> alert('Prodcut deleted successfully');</script>";
            } else {
                echo "<script>alert('Deletion failed');</script>";
            }
        } else {
            echo "<script> alert('Image file not found');</script>";
        }
     }
}

function registerStaff($conn){
 
    $userName=mysqli_real_escape_string($conn,$_POST["userName"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);
    $userType=mysqli_real_escape_string($conn,$_POST["userType"]);

    $userNamecheckQuery="SELECT * from usercredentials where userName='$userName'";  
    $checkuserNameResult=mysqli_query($conn,$userNamecheckQuery);

    if(mysqli_num_rows($checkuserNameResult)>0){   // if true, provided user name is existing
        echo "<script>alert('User name already exists !!! Try with a different user name');</script>";
    }
    else{      //inserting the user inputs

    $sql1="INSERT into usercredentials (userName, password, userType ) 
    values('$userName','$password','$userType')";
    $result1 =mysqli_query($conn,$sql1);   //executing mysql query

    $sql2="INSERT into userdetails (userName)
    values('$userName')";

    $result2=mysqli_query($conn,$sql2);
    

    if($result1 &&  $result2){    //if true data inserted to both tables successfully
        echo "<script>alert('New staff member has registered sucessfully');</script>";
         }
         else{
           echo "<script>alert('Staff registration failed !!!');</script>";
         }
    }   
    
}

function viewStaff($conn){

    $sql = "SELECT ud.firstName,ud.lastName,ud.address,ud.contact,ud.email,uc.userType  
     From userdetails  AS ud                    
     INNER JOIN usercredentials AS uc ON ud.userName=uc.userName 
    where uc.userType IN ('Admin','Field Officer')";   //query getting data from two tables 
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<tr>";                       //generating a table structure dynamically if data was found 
        echo " <th>First Name</th>";
        echo "  <th>Last Name</th>";
        echo "  <th>Address</th>";
        echo "  <th>Contact</th>";
        echo "  <th>Email</th>";
        echo "  <th>User Type</th>";
        echo " </tr>";
        while ($row = mysqli_fetch_assoc($result)) { //fetching data from the database
            echo "<tr>";
            echo "<td>" . $row["firstName"] . "</td>";
            echo "<td>" . $row["lastName"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["contact"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["userType"] . "</td>";
            echo "</tr>"; 
        }
    }
    else{
        echo "<tr>";
        echo "<th colspan='3'>No Data Found !!!</th>";
        echo "</tr>"; 
    }

}

function viewFarmer($conn){
    $sql = "SELECT ud.firstName,ud.lastName,ud.address,ud.contact,ud.email
    From userdetails  AS ud
    INNER JOIN usercredentials AS uc ON ud.userName=uc.userName 
   where uc.userType ='farmer' ";
   
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
       echo "<tr>";
       echo " <th>First Name</th>";
       echo "  <th>Last Name</th>";
       echo "  <th>Address</th>";
       echo "  <th>Contact</th>";
       echo "  <th>Email</th>";
       echo " </tr>";
       while ($row = mysqli_fetch_assoc($result)) { //fetching data from the database
           echo "<tr>";
           echo "<td>" . $row["firstName"] . "</td>";
           echo "<td>" . $row["lastName"] . "</td>";
           echo "<td>" . $row["address"] . "</td>";
           echo "<td>" . $row["contact"] . "</td>";
           echo "<td>" . $row["email"] . "</td>";
           echo "</tr>"; 
       }
   }
   else{
       echo "<tr>";
       echo "<th colspan='3'>No Data Found !!!</th>";
       echo "</tr>"; 
   }
}


if (isset($_POST['delete-product'])) {     //invoking functions when button clicks are set

            deleteProduct($conn);
   }
 elseif (isset($_POST['registerStaff'])) {
        registerStaff($conn);
}
?>