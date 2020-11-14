<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'michelle23.mysql.database.azure.com', 'panas23@michelle23', 'Michelle23', 'itflab2', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$id = $_GET['id']; // get id through query string

$del = mysqli_query($conn,"delete from newbook where id = '$id'"); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:show.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>