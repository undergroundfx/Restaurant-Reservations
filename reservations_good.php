<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<form action="reservations.php" method="POST">

<table style="border-width:10px; border-color:#000; border-style: solid;">
<tr><td colspan="2" align="center"><h3>Cafe Alki Restaurant Reservations</h3></td></tr>
<tr><td width="95">First Name:</td><td width="225"><input name="firstname" type="text" size="30" /></td></tr>
<tr><td>Last Name:</td><td><input name="lastname" type="text" size="30" /></td></tr>
<tr><td>Phone Number:</td><td><input name="phone" type="text" size="15" /></td></tr>
<tr><td>Party Name:</td><td><input name="partyname" type="text" size="30" /></td></tr>
<tr><td>Party Size:</td><td><input name="partysize" type="text" size="30" /></td></tr>
<tr>
  <td>Parking Passes</td>
  <td><input type="radio" name="pass"  value="yes" />
    <label for="radio">yes
      <input type="radio" name="pass"  value="no" />
      no</label></td>
</tr>
<tr><td>Email Address:</td><td><input name="email" type="text" size="30" /></td></tr>
<tr><td>Month:</td><td>
<select name="month">
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
</select></td></tr>
<tr><td>Date:</td><td>
<select name="date">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>

</select></td></tr>

<tr>
  <td colspan="2" align="center"><input type="submit" name="button" id="button" value="Submit" /></td>
  </tr>
</table>

</form>

    <div><h1 style="color:blue;">Welcome back, <?php echo $firstname .' '.$lastname?></h1> </div> 
       <div><h1 style="color:blue;">You ordered parking passses: <?php echo $pass ?></h1> </div> 
<?php

// Create connection
$con = mysqli_connect("localhost","undergro_ssc","southseattle!","undergro_reservations") or die(mysqli_connect_error());

//test
if (isset($theid)) {
	echo "Item $theid Deleted";
	
	$delete1 = "DELETE FROM form WHERE formid = $theid";
	mysqli_query($con, $delete1);
	
};


//set form variables
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$partyname = $_POST['partyname'];
$partysize = $_POST['partysize'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$month = $_POST['month'];
$date = $_POST['date'];


//send queries
mysqli_query($con,"UPDATE form SET partysize = partysize + $number");

mysqli_query($con,"INSERT INTO form (firstname, lastname, phonenumber, partyname, partysize, parkingpasses, email, month, date) VALUES ('$firstname', '$lastname', '$phone', '$partyname', '$partysize', '$parkingpasses', '$email', '$month', '$date')");


?>

    
    
    <table cellpadding="5" border="1" bgcolor="#CCCCCC" width="50%">
<?php

$query = 'SELECT * FROM form';
$result = mysqli_query($con, $query);

if ($result) {
    
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    echo '<tr><td><form method="GET" action="reservations.php"><input type="hidden" name="theid" value="'.$row['formid'].'"><input type="submit" value="Delete" name="delete"> </form></td><td>'.$row['formid'].'</td><td>'.$row['firstname'].'</td><td>'. $row['lastname'].'</td><td>'. $row['phonenumber'].'</td><td>'. $row['partysize'].'</td><td>'. $row['partyname'].'</td><td>'. $row['parkingpasses'].'</td><td>'. $row['email'].'</td><td>'. $row['month'].'</td><td>'. $row['date'].'</td></tr>';
    
  }
  } else {
    echo 'cant get query';
}

echo '</table>';


$todelete = $row['formid'];
echo $todelete;




$delete = $_POST['button'];
   if ($delete == "Delete Product")
   {
      $prodid = $_POST['prodid'];
      $query = "DELETE from products WHERE prodid = $prodid";
      $result = mysql_query($query);
      if ($result)
      {
         echo "<h2>Product: $prodid deleted</h2>\n";
         exit;
      } else
      {
         echo "<h2>Problem deleting $prodid</h2>\n";
         exit;
      }
   } else





$con = mysqli_connect("localhost","undergro_ssc","southseattle!!","undergro_reservations") or die(mysqli_connect_error());

//$query2 = "SELECT partysize FROM form WHERE month=$month and date=$date";

$query3 = "SELECT * FROM form WHERE month=$month and date=$date";
$size = mysqli_query($con, $query3);
echo "make it here!?";


foreach($size as $thesize) {
	
	echo $thesize;
	//$total += $size;

}


// calculate 
$remaining = 0;    //0 - $total;


// this part works
if ($remaining > 0) {
	echo "Your reservations for $partysize has been made. You should receive an email shortly. Thank you.";	
	
	// statements to add record
	
} else {
	echo "There are only $remaining spots available on this date. Please resubmit form with $remaining or less spots."; 
}





//close connection
mysqli_close($con);
?>
                
            
       
</body>
</html>