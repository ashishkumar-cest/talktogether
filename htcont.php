<?php
session_start();
error_reporting(0);


?>
<?php
include 'connection.php';
$room =  $_SESSION['roomname'];
$sql = "SELECT msg, stime, ip FROM msgs WHERE room = '".$room."' ";

$res = "";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)>0) 
{
	while ($row = mysqli_fetch_array($result)) 
	{
		?>
		<div class="container">
		<?php echo $row['ip'];?> says
		<p><?php echo  $row['msg'];?>
		</p> <span class="time-right"> <?php $time=date($row['stime']);echo $time;  ?></span></div>
	

<?php
}
}

?>