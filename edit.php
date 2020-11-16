
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<h3>Update Data</h3>

<form method="POST">
<div class="form-group">
  <input class="form-control" type="text" name="Name" value="<?php echo $Result['Name'] ?>" placeholder="Enter Name" Required>
  <input class="form-control" type="text" name="Comment" value="<?php echo $Result['Comment'] ?>" placeholder="Enter Comment" Required>
  <input class="form-control" type="text" name="Link" value="<?php echo $Result['Link'] ?>" placeholder="Enter Link" Required>
  <input type="submit" name="update" value="update" class="btn btn-primary">
</div>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
