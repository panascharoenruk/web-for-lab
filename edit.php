<body style="background-color: gray;">
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
    $link = $_POST['Link'];
	
    $edit = mysqli_query($conn,"update newbook set Name = '$name', Comment = '$comment', Link = '$link' where id = '$id'");
	
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
  <input class="form-control" type="text" name="Name" value="<?php echo $Result['Name'] ?>" placeholder="Enter Name" Required>
  <input class="form-control" type="text" name="Comment" value="<?php echo $Result['Comment'] ?>" placeholder="Enter Comment" Required>
  <input class="form-control" type="text" name="Link" value="<?php echo $Result['Link'] ?>" placeholder="Enter Link" Required>
  <input type="submit" name="update" value="update" class="btn btn-primary">
</form>
</body>