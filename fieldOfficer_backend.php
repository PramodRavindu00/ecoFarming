<?php

include("dbConnection.php");

function viewProducts($conn){
    $sql = "SELECT * From product";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<tr>";
        echo " <th>Product Name</th>";
        echo "  <th colspan='3'>Image</th>";
        echo " </tr>";
        while ($row = mysqli_fetch_assoc($result)) { //fetching data from the database
            echo "<tr>";
            echo "<td>" . $row["productName"] . "</td>";
            echo "<td><img src='products/" .   $row["imageFilePath"] . "'alt='Image unavailable'></td>";
            echo "</tr>"; 
        }
    }
    else{
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
        echo "<td><button type='button' class='clearbtn' onclick='hideResults(this)'>Clear</button></td>";
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

function viewQueries($conn){
    $sql = "SELECT * From queries ";
   
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
       echo "<tr>";
       echo " <th>Name</th>";
       echo "  <th>User Type</th>";
       echo "  <th>Contact</th>";
       echo "  <th>Email</th>";
       echo "  <th colspan='2'>Message</th>";
       echo " </tr>";
       while ($row = mysqli_fetch_assoc($result)) { 
           echo "<tr>";
           echo "<td>" . $row["Name"] . "</td>";
           echo "<td>" . $row["userType"] . "</td>";
           echo "<td>" . $row["contact"] . "</td>";
           echo "<td>" . $row["email"] . "</td>";
           echo "<td>" . $row["message"] . "</td>";
           echo "<form action='' method='POST'>";
            echo"<input type='hidden' name='ID' value='" . $row["ID"] . "'>";  //setting a hidden input which needs for other functions
            echo "<td><input type='submit' class='delbtn' name='delete-query' value='Delete'></td>";
            echo "</form>"; 
           echo "</tr>"; 
       }
   }
   else{
       echo "<tr>";
       echo "<th colspan='3'>No Data Found !!!</th>";
       echo "</tr>"; 
   }

}



function deleteQuery($conn){

    $deleteID=$_POST['ID'];  //get the unique id of the query

    $sql="DELETE from queries where ID='$deleteID'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Query Deleted successfully');</script>";
    }else{
        echo "<script>alert('Failed deletion');</script>";
    }
    header("refresh:0;url=fieldOfficer_dashboard.php#Query-section");
}





if (isset($_POST['delete-query'])) {
    deleteQuery($conn);
}
?>