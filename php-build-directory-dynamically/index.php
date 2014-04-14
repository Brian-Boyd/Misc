<?php
$opt = array(
	// any occurring errors wil be thrown as PDOException
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	// an SQL command to execute when connecting
	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
);
$pdo = new PDO('mysql:host=localhost;dbname=testdb', 'root', '', $opt);
?>

<!doctype html>
<html>
<head>
	<title></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/local.css" rel="stylesheet">
</head>
<body bgcolor=#CCC>

<h1>Church Directory</h1>
	
<div class="directory">
	<?php 
	// using the PDO instantiation from above
	$ps = $pdo->prepare("SELECT DISTINCT `Heading` FROM contacts WHERE Category = ?");
	
	// if there are any groups
	if($ps->execute(array("Church"))>0):
		//foreach ($ps as $Category) {
		while ($group = $ps->fetch(PDO::FETCH_ASSOC)):                   
	?>
	
	<div class="group">
		<div class="row" style="background-color:#666" >
			<div class="col-md-12"><p><?php echo $group['Heading']; ?></p></div>
		</div>
		<div class="row">
	
<?php
	// retrieve churches within that group
	$ps2 = $pdo->prepare("SELECT * FROM contacts WHERE Heading = ? AND Category = ?");
	$ps2->execute(array($group['Heading'], 'church'));
		
	//Start a while loop to process all the rows
	$count = $ps2->rowCount();
	$break = 3;
	if($count>0){
		
		$i = 0;
		while ($row = $ps2->fetch(PDO::FETCH_ASSOC)) {
			$i++; // increment every time
			//print_r($row);
			# the function extract() extracts an array as variables
			extract ($row);
?>
		
			<div class="col-md-4">
				<p><strong><?php echo $Name; ?></strong><br /><?php echo $Address; ?><br /><?php echo $City; ?><br /><?php echo $Phone; ?></p>
			</div>
		
<?php
			# if we displayed 3 results and there are more results to be shown, then close that div (row) and start a new one
			if($i%3==0 && $i<$count-1){
			?>
			</div>
			<div class="row">
			<?php	
			}
		
		} //END WHILE
?>
		</div>
<?php
	} // end if
?>
    
	</div>
	
	<?php 
	endwhile; // end group loops
endif; // end if there are groups 
	 
 ?>
	
</div>

<?php
$db = null;
?>

</body>
</html>


