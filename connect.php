<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
  echo "zala <br>";
}
if(isset($_POST['submit']))
    {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $phone_number = $_POST['phone_number'];
        $highest_qualification = $_POST['highest_qualification'];
        $genderr = $_POST['gender'];
        $cgpa = $_POST['cgpa'];
        $pname = rand(1000, 100000) . "-" . $_FILES["file"]["name"];
        $tname = $_FILES["file"]["tmp_name"];
        $uploads_dir = 'resumes';
        move_uploaded_file($tname, $uploads_dir . '/' . $pname);


        $sql_query = "INSERT INTO user (name,email,city,phone_number,highest_qualification,gender,cgpa,file) VALUES ('$username','$email','$city','$phone_number','$highest_qualification','$genderr','$cgpa','$pname')";
        
        if(mysqli_query($conn,$sql_query)){
            echo 'alert($username)';
        }
        else{
            echo "Error!".$sql."".mysqli_error($conn);
        }
        mysqli_close($conn);
    }
/*if(isset($_POST['submit']))
    {
        $username = $_POST['name'];
       $email = $_POST['email'];
        $city = $_POST['city'];
        $phone_number = $_POST['phone_number'];
        $highest_qualification = $_POST['highest_qualification'];
 //       $Gender = $_POST['gender'];
        $cgpa = $_POST['cgpa'];
        $sql_query = "INSERT INTO user (name,email,city,phone_number,highest_qualification,cgpa) VALUES ('$username','$email','$city','$phone_number','$highest_qualification','$cgpa')";
        
        if(mysqli_query($conn,$sql_query)){
            echo "New deatails added";
        }
        else{
            echo "Error!".$sql."".mysqli_error($conn);
        }
        mysqli_close($conn);
    }
*/
?>