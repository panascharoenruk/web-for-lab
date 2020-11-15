<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'michelle23.mysql.database.azure.com', 'panas23@michelle23', 'Michelle23', 'itflab2', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}


$id = $_GET['id']; // get id through query string

$res = mysqli_query($conn,"select * from newbook where id ='$id'"); // select query

$Result = mysqli_fetch_array($res); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['Name'];
    $comment = $_POST['Comment'];
	
    $edit = mysqli_query($conn,"update newbook set Name = '$name', Comment = '$comment' where id = '$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:show.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="Name" value="<?php echo $Result['Name'] ?>" placeholder="Enter Name" Required>
  <input type="text" name="Comment" value="<?php echo $Result['Comment'] ?>" placeholder="Enter Comment" Required>
  <input type="submit" name="update" value="update">
</form>