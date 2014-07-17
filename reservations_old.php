<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Reservations</title>

<style>
    

    tr:nth-child(odd)  {    /* to color odd rows of a table */
background:#ccc;
}    

tr:nth-child(even)  {    /* to color odd rows of a table */
background:#99ffff;
}    

td {
    padding:5px;
}
    
</style>
</head>

<body>


<form action="reservations.php" method="POST">

<table style="border-width:10px; border-color:#000; border-style: solid;">
<tr><td colspan="2" style="text-align:center"><h3>Cafe Alki Restaurant Reservations</h3></td></tr>
<tr><td width="95">First Name:</td><td width="225"><input name="firstname" type="text" size="30" /></td></tr>
<tr><td>Last Name:</td><td><input name="lastname" type="text" size="30" /></td></tr>
<tr><td>Phone Number:</td><td><input name="phone" type="text" size="15" /></td></tr>
<tr><td>Party Name:</td><td><input name="partyname" type="text" size="30" /></td></tr>
<tr><td>Party Size:</td><td><input name="partysize" type="text" size="30" /></td></tr>
<tr>
  <td>Parking Passes</td>
  <td><label for="radio"><input type="radio" id="radio" checked="" name="pass"  value="yes" />
    yes</label>
      <input type="radio" name="pass" id="radios" value="no" />
      no</td>
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
  <td colspan="2" style="text-align:center;"><input type="submit" name="button" id="button" value="Submit" /></td>
  </tr>
</table>

</form>

    
    <?php
    
    
    
    //set form variables

if (isset($_POST['firstname']))   {    
    
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$partyname = $_POST['partyname'];
$partysize = $_POST['partysize'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$month = $_POST['month'];
$date = $_POST['date'];
$parkingpasses = $_POST['pass'];



    
    ?>
    
    
    <div><h1 style="color:blue;">Thank you <?php echo $firstname .' '.' for making reservations.'?></h1> </div> 
       <div><h1 style="color:blue;">
               <?php
               
               if ($parkingpasses == 'yes' ) {
                   
                   echo "You will receive your parking passes by email";                         
               }
 
               ?>
                           
               </h1> </div> 
       
     <?php  }  ?>
       
<?php

require ('connect_db.php');

if (isset($firstname)) {
    
    $query3 = "SELECT partysize FROM form WHERE month = \"$month\" AND date = \"$date\"";
    $result5 = mysqli_query($con, $query3);

    if ($result5) {

        //echo "query good";

        $sum = 0;
            while ($row = mysqli_fetch_array($result5, MYSQLI_ASSOC)) {

                $sum = $sum + $row['partysize'];          
            } 
    } else {
     echo "query bad";   
    }
    // add existing total with new total in form value
    //$sum = $sum + $partysize;
    //$remaining = 40 - $sum;


$total = $sum + $partysize;

if ($total <= 40 ) {

      echo "Your reservations for $partysize has been made. You should receive an email shortly. Thank you.";
      
      mysqli_query($con,"INSERT INTO form (firstname, lastname, phonenumber, partyname, partysize, parkingpasses, email, month, date) VALUES ('$firstname', '$lastname', '$phone', '$partyname', '$partysize', '$parkingpasses', '$email', '$month', '$date')");
} else {
      
     
    $left = 40 - $sum; 
    if ($left > 0){
    echo "Sorry, there are only <strong>$left</strong> reservation spots left. Please resubmit form for a party size max of up to  <strong>$left</strong>";
    } else {
    echo "Sorry, there are 0 reservations left out of 40 available for this day.";    
    }
    }
    
}    
echo  '<table style="border:none; padding:5px; width:70%;">';

echo '<tr style="font-weight:bold; text-align:center;"><td>Delete</td><td>Form ID</td><td>First Name</td><td>Last Name</td><td>Phone Number</td><td>Party Size</td><td>Party Name</td><td>Parking Passes</td><td>Email</td><td>Month</td><td>Date</td></tr>';
    
$query = 'SELECT * FROM form';
$result = mysqli_query($con, $query);

if ($result) {
    
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    echo '<tr><td><form method="GET" action="reservations.php"><input type="hidden" name="theid" value="'.$row['formid'].'"><input type="submit" name="delete" value="Delete"> </form></td><td>'.$row['formid'].'</td><td>'.$row['firstname'].'</td><td>'. $row['lastname'].'</td><td>'. $row['phonenumber'].'</td><td>'. $row['partysize'].'</td><td>'. $row['partyname'].'</td><td>'. $row['parkingpasses'].'</td><td>'. $row['email'].'</td><td>'. $row['month'].'</td><td>'. $row['date'].'</td></tr>';
    
  }
  } else {
    echo 'cant get query';
}

echo '</table><a name="table">';

if (isset($_GET['theid'])) {
      
      $prodid = $_GET['theid'];
      $query2 = "DELETE FROM form WHERE formid=\"$prodid\"";
      $result2 = mysqli_query($con, $query2);
      if ($result2)
      {
        
          echo "<h2>Reservation: $prodid deleted <a href=\"reservations.php#table\">Refresh List</a></h2>\n";
       //   header('Location: admin.php');
     
      } else {
         echo "<h2>Problem deleting $prodid</h2>\n";
         
      }
   }



//close connection
mysqli_close($con);
?>
                
            
       
</body>
</html>