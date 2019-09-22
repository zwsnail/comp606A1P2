<?php include_once("header.php");?>
<div style="text-align:center;"><br><br><br><br><br><br><br>
<h1>Client Details</h1><br><br>
<?php
if(!isset($_SESSION["therapist_email"])){
	header("Location: login_register.php");
	exit(); 
}
$showRecordPerPage = 2;
if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
}else{
$currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "SELECT * FROM booking";
$allEmpResult = mysqli_query($con, $totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;
$empSQL = "SELECT user.id, user.fullname, user.gender, user.mob_number, user.is_late, booking.massage_time, booking.reason, booking.price FROM user
INNER JOIN booking ON user.id=booking.user_id LIMIT $startFrom, $showRecordPerPage";
$empResult = mysqli_query($con, $empSQL);
?>
<table class="table ">
<thead>
<tr>
<th>User Id</th>
<th>Name</th>
    <th>Gender</th>
	<th>Mobile Number</th>
	<th>Booking Time</th>
	<th>Reason</th>
	<th>Package</th>
	<th>Any Late cancellation fee?</th>
</tr>
</thead>
<tbody>
<?php
while($row = mysqli_fetch_assoc($empResult)){

$userid = $row["id"];
$username = $row["fullname"];
        //echo $username;
        $gender = $row["gender"];
        //echo $gender;
		$mob_number = $row["mob_number"];
		$massage_time = $row["massage_time"];
		$reason = $row["reason"];
		$price = $row["price"];
		$is_late = $row["is_late"];
		
		echo "<tr>";
		echo "<th scope='row'>".$userid."</th>";
		echo"<td>".$username."</td>";
		echo"<td>".$gender."</td>";
		echo"<td>".$mob_number."</td>";
		echo"<td>".$massage_time."</td>";
		echo"<td>".$reason."</td>";
		echo"<td>".$price."</td>";
		echo"<td>".$is_late."</td>";
		echo"</tr>";
} ?>
</tbody>
</table>
<nav aria-label="Page navigation">
<ul class="pagination">
<?php if($currentPage != $firstPage) { ?>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
<span aria-hidden="true">First</span>
</a>
</li>
<?php } ?>
<?php if($currentPage >= 2) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
<?php } ?>
<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
<?php if($currentPage != $lastPage) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
<span aria-hidden="true">Last</span>
</a>
</li>
<?php } ?>
</ul>
</nav>



