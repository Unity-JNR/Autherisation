<link rel="stylesheet" href="https://ssl.gstatic.com/docs/script/css/add-ons1.css">







<?php

include 'database.php' ;
// include 'user.php';
echo '<br>';
echo 'Books';
echo '<br>';


$sql = "SELECT book_name, year, genre, age_group FROM books order by book_name asc";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo  " - Book: " . $row["book_name"]. " year: " . $row["year"]. " - genre: " . $row["genre"]. " - age_group: " . $row["age_group"]."<br>";
    }
  } else {
    echo "0 results";
  }

  echo '<br>';



  


     echo 'authors and books';
     echo '<br>';
    $sql = "SELECT DISTINCT author_name, age, genre, book FROM authors order by author_name desc, book desc, genre asc";
    $result = mysqli_query($conn, $sql);
   
    if (mysqli_num_rows($result) > 0) {
       // output data of each row
       while($row = mysqli_fetch_assoc($result)) {
         echo  " - Name: " . $row["author_name"]. " age: " . $row["age"]. " - genre: " . $row["genre"]. " - book: " . $row["book"]."<br>";
       }
     } else {
       echo "0 results";
     }
     echo '<br>';

     
  if(isset($_POST['save'])){ 
    // $search = $_POST['names-author'];
      $search = $_POST['search'];
     $sql = "SELECT author_name, age, genre, book FROM authors  where author_name like '%$search%'";

     $result = $conn->query($sql);
     
     if (mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        echo  " - Name: " . $row["author_name"]. " age: " . $row["age"]. " - genre: " . $row["genre"]. " - book: " . $row["book"]."<br>";
     }
     } else {
       echo "0 records";
     }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  

<form action="<?php $_SERVER['PHP_SELF']; ?>  " method="post">
<input type="text" name="search" id="search">
<button type="submit" name="save">Search</button>



</form>


</body>
</html>


