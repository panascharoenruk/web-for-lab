<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'michelle23.mysql.database.azure.com', 'panas23@michelle23', 'Michelle23', 'itflab2', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}


$name = $_POST['name'];
$comment = $_POST['comment'];
$link = $_POST['link'];


$sql = "INSERT INTO newbook (Name , Comment , Link) VALUES ('$name', '$comment', '$link')";


if (mysqli_query($conn, $sql)) {
    mysqli_close($conn); // Close connection
    header("location:show.php"); // redirects to all records page
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>
