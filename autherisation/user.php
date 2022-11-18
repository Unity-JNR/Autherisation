<link rel="stylesheet" href="https://ssl.gstatic.com/docs/script/css/add-ons1.css">

<form action="index.html" method="post" >

<label for="logout">logout</label>
<input type="submit" name="save" value="loan">
</form>
<?php

use PhpMyAdmin\Sql;

 include 'database.php' ;
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

  
?>


<form action="" method="post">

<label for="loan">Loan a book</label>
<input type="submit" name="save" value="loan">
</form>




