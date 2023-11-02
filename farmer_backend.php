<?php

include("dbConnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

function submitQuery($conn){

    $userName=$_SESSION['userName']; 
      $userType= $_SESSION['userType'];  //acessing the session variable 
      
      $name=mysqli_real_escape_string($conn,$_POST['name']);
      $contact=mysqli_real_escape_string($conn,$_POST['contact']);
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $message=mysqli_real_escape_string($conn,$_POST['question']);

      $sql="INSERT into queries (userName,Name, userType,contact,email,message )
       values('$userName','$name','$userType','$contact','$email','$message')";

       $result =mysqli_query($conn,$sql);

       if($result){ 
         echo "<script>alert('Your inquiry submitted .We will contact you as soon as possible');</script>";
    }
       else{
        echo "<script>alert('An error occured while submitting the inquiry');</script>";
       }
}

function addProduct($conn){

    $userName= $_SESSION['userName'];  //getting the username of the logged user through the session variable

    $productName=$_POST["product_name"];
    $imageName=$_FILES["image"]["name"];
    $tmpName=$_FILES["image"]["tmp_name"];
    
    $newImageName=uniqid();   //generating a unique id for each image 

    $newImageName.='.'.$imageName;   //concatinating new generated image name with the file extension

    move_uploaded_file($tmpName,'products/'.$newImageName );  //moving to the directory

    $sql = "INSERT INTO product (productName, imageFilePath,userName)
    VALUES ('$productName', '$newImageName','$userName')";
    
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('New product added successfully');</script>";
    }
    else{
        echo "<script>alert('New product adding Failed');</script>";
    }
}  


}
if (isset($_POST['submit_query'])) {
    submitQuery($conn);
}
elseif(isset($_POST['add_product'])) {
       addProduct($conn);
}

?>
