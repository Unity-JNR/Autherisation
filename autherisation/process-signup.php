<?php 



if(empty($_POST['name'])){
    die("name is required");
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("valid email is required");
}

if(strlen($_POST["password"]< 8)){
    die("password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$name_ =$_POST['name'];
$email_=$_POST['email'];

$userRole = $_POST['role'];

echo $userRole;
// print_r($_POST); 
// var_dump($password_hash);


 include 'database.php' ;


$sql = "INSERT INTO user (user_name, email, password_hash,roles)
VALUES ('$name_', '$email_', '$password_hash','$userRole')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    if($userRole=='User'){
        header("Location: user.php");
    }
    if($userRole=='Librarian'){
        header("Location: librarian.php");
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  if(isset($_POST['save'])){ 
    $search = $_POST['names'];
 $sql = "SELECT DISTINCT author_name, age, genre, book FROM authors where author_name like '%$search%'";
 $result = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo  " - Name: " . $row["author_name"]. " age: " . $row["age"]. " - genre: " . $row["genre"]. " - book: " . $row["book"]."<br>";
    }
  } else {
    echo "0 results";
  }}





?>

// <?php include 'database.php' ?>
