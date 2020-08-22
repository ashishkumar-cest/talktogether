<?php
session_start();
error_reporting(0);
$roomname = $_GET['roomname'];
$_SESSION['roomname']=$roomname;

?>


<?php
include 'connection.php';

$sql = "SELECT * FROM rooms WHERE roomname = '".$roomname."'";

$result = mysqli_query($con, $sql);
if ($result) 
{
	if (mysqli_num_rows($result) == 0) 
	{
		$message= "This room does not exist. Try creating a new one.";
		echo '<script language = "javascript">';
		echo 'alert("'.$message.'");';
		echo 'location="index.php";';
		echo '</script>';
	}
}
else
{
	echo "Error :" . mysqli_error($con);
}



?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 <link href="product.css" rel="stylesheet">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyClass{
	height: 350px;
	overflow-y: scroll;
}
</style>
</head>
<body>
	<?php include 'navbar.php'?>

<h2>Chat Messages - <?php echo "$roomname"?></h2>

<div class="container">
	<div class="anyClass">

 
  	</div>
</div>



<input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Type message"><br>
<button class="btn btn-dark" name="submitmsg" id="submitmsg">Send </button>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

<script type="text/javascript">

	//check for new messages everysecond
setInterval(runFunction, 1000);
function runFunction()
{
	$.post("htcont.php", {room: '<?php echo $roomname ?>'},
		function(data, status)
		{
			document.getElementsByClassName('anyClass')[0].innerHTML = data;
		}

		)
}


	var input = document.getElementById("usermsg");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("submitmsg").click();
  }
});



	$("#submitmsg").click(function(){
		var clintmsg = $("#usermsg").val();
	$.post("postmsg.php", {text: clintmsg, room:'<?php echo $roomname ?>', ip: '<?php echo $_SERVER['REMOTE_ADDR'] ?>'},
	function(data,status){
		document.getElementsByClassName("anyClass")[0].innerHTML = data;});
	$('#usermsg').val('');
	return false;
	});


</script>
</body>
</html>